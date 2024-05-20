<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\User;
use App\Models\InternReference;
use App\Models\ReferenceCheck;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
}
