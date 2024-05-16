<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\InternReference;
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
            $fileName = time().auth()->user()->name . ".pdf";
            $request->file("resume")->storeAs('resume/', $fileName, 'local');

            $application = auth()->user()->application()->create([
                "school" => $request->school,
                "stack" => $request->stack,
                "skills" => $request->skills,
                "resume" => $fileName,
                "note" => $request->note,
            ]);

            //create reference 1
            echo('Creating Reference 1');
            InternReference::create([
                "application_id" => $application->id,
                "name" => $request->reference1_name,
                "org" => $request->reference1_org,
                "relationship" => $request->reference1_relationship,
                "phone" => $request->reference1_phone,
                "email" => $request->reference1_email,
                "prefContact" => $request->reference1_prefContact,
            ]);

            //create reference 2
            InternReference::create([
                "application_id" => $application->id,
                "name" => $request->reference2_name,
                "org" => $request->reference2_org,
                "relationship" => $request->reference2_relationship,
                "phone" => $request->reference2_phone,
                "email" => $request->reference2_email,
                "prefContact" => $request->reference2_prefContact,
            ]);

            //create reference 3
            InternReference::create([
                "application_id" => $application->id,
                "name" => $request->reference3_name,
                "org" => $request->reference3_org,
                "relationship" => $request->reference3_relationship,
                "phone" => $request->reference3_phone,
                "email" => $request->reference3_email,
                "prefContact" => $request->reference3_prefContact,
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
