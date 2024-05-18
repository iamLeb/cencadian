<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
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
        $this->middleware(['auth']);
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
            'title' => 'required',
            'executive_summary' => 'required',
            'community_involvement' => 'required',
            'background_rationale' => 'required',
            'project_requirements' => 'required',
            'project_team' => 'required',
            'budget' => 'required',
            'other_remarks' => 'required',
            'org_category' => 'required',
            'service_category' => 'required',
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

        auth()->user()->serviceRequest()->create($request->all());

//        if ($request->hasFile("file")) {
//            $fileName = time().auth()->id() . ".pdf";
//            $request->file("file")->storeAs('file/', $fileName, 's3');
//
//            auth()->user()->serviceRequest()->update([
//                "file" => $fileName
//            ]);
//        }

        return redirect()->route('company.home')->with('success', 'Service Request Created');

    }
}
