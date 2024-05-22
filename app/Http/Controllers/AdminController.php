<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ServiceRequest;
use App\Models\User;
use App\Models\InternReference;
use App\Models\ReferenceCheck;
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
        $this->middleware(['auth', 'isAdmin']);
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
}
