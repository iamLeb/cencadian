<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
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

    public function store(Request $request)
    {
        $request['address'] = $request->city . ', ' . $request->country . ', ' . $request->postalCode;


        if ($request->hasFile("resume")) {
            $fileName = time().auth()->id() . ".pdf";
            $request->file("resume")->storeAs('resume/', $fileName, 's3');

            auth()->user()->application()->create([
                "school" => $request->school,
                "stack" => $request->stack,
                "skills" => $request->skills,
                "resume" => $fileName,
                "note" => $request->note,
            ]);
        }

        auth()->user()->update([
            "phone" => $request->phone,
            "address" => $request->address,
            "dob" => $request->dob,
            "gender" => $request->gender
        ]);

        return redirect()->back()->with('success', "Your Application Has Been Submitted.");
    }
}
