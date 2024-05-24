<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ServiceRequest;
use App\Models\User;
use App\Models\InternReference;
use App\Models\ReferenceCheck;
use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function Termwind\render;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
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
            "user" => $user,
            'references' => $references
        ]);
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        if (auth()->id() != 1) {
            return redirect()->back()->with('error', 'Unauthorized Request Detected!!');
        } else {
            User::create($request->all());
            return redirect()->back()->with('success','Admin Created Successfully.');
        }

    }

    public function deleteAdmin($id)
    {
        if($id === 1) {
            return redirect()->back()->with('error', 'You Cannot Delete a Supper Admin');
        } else {
            User::destroy($id);
            return redirect()->back()->with('success', 'Admin Deleted Successfully...');
        }
    }

    public function showInterviewNotes(Request $request)
    {   
        $application = Application::where('id', $request->applicationId)->first();
        $interviewer = User::where('id', $request->interviewerId)->first();
        $interview = Interview::where('application_id', $request->applicationId)->where('interviewer_id', $request->interviewerId)->first();

        if (!$application or !$interviewer) {
            abort('404');
        }

        return view('admin/intern/showInterviewNotes', [
            "application" => $application,
            "interviewer" => $interviewer,
            "interview" => $interview
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
}
