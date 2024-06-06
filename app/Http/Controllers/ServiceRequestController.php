<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
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

    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:300',
            'executive_summary' => 'required|string|max:2500',
            'community_involvement' => 'required|string|max:2500',
            'background_rationale' => 'required|string|max:2500',
            'project_requirements' => 'required|string|max:2500',
            'project_team' => 'required|string|max:2500',
            'budget' => 'required|string|max:2500',
            'org_category' => 'required|string|max:300',
            'service_category' => 'required|string|max:300',
            'other_remarks' => 'string|nullable|max:2500'
        ]);

//        ServiceRequest::create([
//            "user_id" => auth()->id(),
//            "title" => $request->title,
//            "executive_summary" => $request->executive_summary,
//            "community_involvement" => $request->community_involvement,
//            "background_rationale" => $request->background_rationale,
//            "project_requirements" => $request->project_requirements,
//            "project_team" => $request->project_team,
//            "budget" => $request->budget,
//            "other_remarks" => $request->other_remarks,
//            "org_category" => $request->org_category,
//            "service_category" => $request->service_category,
////            "file" => ""
//        ]);

        $request['status'] = 'received';
        auth()->user()->serviceRequest()->create($request->all());

//        if ($request->hasFile("file")) {
//            $fileName = time().auth()->id() . ".pdf";
//            $request->file("file")->storeAs('file/', $fileName, 's3');
//
//            auth()->user()->serviceRequest()->update([
//                "file" => $fileName
//            ]);
//        }

        return redirect()->route('company.home')->with('success', ' Created');

    }
}
