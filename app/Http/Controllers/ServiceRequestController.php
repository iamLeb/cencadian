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
            'desc' => 'required',
            'priority' => 'required',
            'budget' => 'required',
            'category' => 'required',
        ]);

        ServiceRequest::create([
            "user_id" => auth()->id(),
            "title" => $request->title,
            "desc" => $request->desc,
            "priority" => $request->priority,
            "deadline" => $request->deadline,
            "budget" => $request->budget,
            "category" => $request->category,
            "file" => ""
        ]);

        if ($request->hasFile("file")) {
            $fileName = time().auth()->id() . ".pdf";
            $request->file("file")->storeAs('file/', $fileName, 's3');

            auth()->user()->serviceRequest()->update([
                "file" => $fileName
            ]);
        }

        return redirect()->route('company.home')->with('success', 'Service Request Created');

    }
}
