<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ServiceRequest;
use App\Models\User;
use App\Models\InternReference;
use App\Models\ReferenceCheck;
use App\Models\Interview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function Termwind\render;
use App\Models\ClockInOut;
use Carbon\Exceptions\InvalidFormatException;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'checkUser']);
    }

    public function index(): View
    {
        return view('home');
    }

    public function interns()
    {
        $interns = User::where('type', 'intern')->get();
        return view('admin/interns', ['interns' => $interns]);
    }

    public function internShow($id)
    {
        $user = User::where('id', $id)->first();
        $references = $user->application->reference ?? '';
        return view('admin/intern/show', [
            'user' => $user,
            'references' => $references
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * Hire Intern
     */
    public function internHire($id): \Illuminate\Http\RedirectResponse
    {
        User::where('id', $id)->update(['type' => 'hired']);
        return redirect()->back()->with('success', 'Intern Has Been Marked as Hired.');
    }

    public function referenceCheckShow($id)
    {
        $reference = InternReference::where('id', $id)->first();
        $referenceCheck = ReferenceCheck::where('reference_id', $id)->first();

        return view('admin/intern/reference/show', [
            "reference" => $reference,
            "referenceCheck" => $referenceCheck
        ]);
    }

    public function companies()
    {
        $companies = User::where('type', 'company')->get();
        return view('admin/company', ['companies' => $companies]);
    }

    public function companyShow($id)
    {
        $serviceRequest = ServiceRequest::where('id', $id)->first();

        return view('admin/company/show', [
            "sr" => $serviceRequest
        ]);
    }

    public function createAdmin()
    {

        return view('admin/admin');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'super_admin' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);


        if (!auth()->user()->super_admin) {
            return redirect()->back()->with('error', 'Unauthorized Request Detected!!');
        } else {
            User::create($request->all());
            return redirect()->back()->with('success','Admin Created Successfully.');
        }

    }

    public function deleteAdmin($id)
    {
        if(!auth()->user()->super_admin) {
            return redirect()->back()->with('error', 'You Cannot Delete a Supper Admin');
        } else {
            User::destroy($id);
            return redirect()->back()->with('success', 'Admin Deleted Successfully...');
        }
    }

    public function internDelete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('admin.interns')->with('success', 'Intern Deleted');
    }

    public function showInterviewNotes(Request $request)
    {
        $application = Application::where('id', $request->applicationId)->first();
        $interviewer = User::where('id', $request->interviewerId)->first();
        $interview = Interview::where('application_id', $request->applicationId)->where('interviewer_id', $request->interviewerId)->first();
        $otherInterviews = Interview::where('application_id', $request->applicationId)->where('interviewer_id', '<>', $request->interviewerId)->get();

        if (!$application or !$interviewer) {
            abort('404');
        }

        $canEdit = $interviewer->id === auth()->user()->id;

        return view('admin/intern/showInterviewNotes', [
            "application" => $application,
            "interviewer" => $interviewer,
            "interview" => $interview,
            "otherInterviews" => $otherInterviews,
            "canEdit" => $canEdit
        ]);
    }

    public function saveInterviewNotes(Request $request)
    {
        $application = Application::where('id', $request->applicationId)->first();
        $interviewer = User::where('id', $request->interviewerId)->first();

        if (!$application or !$interviewer) {
            return redirect()->back()->with('error', 'Application or user not found');
        }

        if ($request->interviewerId != auth()->user()->id) {
            abort('401');
        }

        $interview = Interview::where('application_id', $request->applicationId)->where('interviewer_id', $request->interviewerId)->first();

        if (!$interview) {
            $interview = Interview::create([
                "interviewer_id" => $request->interviewerId,
                "application_id" => $request->applicationId
            ]);
        }

        $interview->update($request->all());

        return redirect()->back()->with('success', 'Interview notes saved successfully');
    }

    public function hiredInterns()
    {
        $users = User::where('type', 'hired')->get();

        return view('admin/intern/hired', [
            "users" => $users,
        ]);
    }

    public function showAddEmployeeDocuments(Request $request)
    {
        $employees = User::where('type', 'hired')->orWhere('type', 'admin')->orWhere('type', 'super_admin')->get();
        return view('addEmployeeDocuments', [
            "employees" => $employees
        ]);
    }

    public function manageClock($id)
    {
        $user = User::where('id', $id)->first();

        $result = [];

        foreach ($user->clock as $clock) {
            $timestamp1 = $clock->clock_in;
            $timestamp2 = $clock->clock_out;

            // Ensure both timestamps are set
            if ($timestamp1 && $timestamp2) {
                $time1 = Carbon::parse($timestamp1);
                $time2 = Carbon::parse($timestamp2);

                $differenceInSeconds = $time1->diffInSeconds($time2);

                $result[] = [
                    'clocked_in' => $timestamp1,
                    'clocked_out' => $timestamp2,
                    'difference_in_seconds' => $differenceInSeconds,
                ];
            }
        }
    }
}
