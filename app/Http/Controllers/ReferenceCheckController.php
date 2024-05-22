<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferenceCheck;
use App\Models\InternReference;

class ReferenceCheckController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'reference_id' => 'required',
            'duration_capacity' => 'required',
            'performance' => 'required',
            'teamwork' => 'required',
            'punctuality' => 'required',
            'problem_solving' => 'required',
            'communication' => 'required',
            'professionalism' => 'required',
            'suitability' => 'required'
        ]);

        $previousRecord = $referenceCheck = ReferenceCheck::where('reference_id', $request->reference_id)->first();

        if ($previousRecord) {
            $previousRecord->update([
                "reference_id" => $request->reference_id,
                "duration_capacity" => $request->duration_capacity,
                "performance" => $request->performance,
                "teamwork" => $request->teamwork,
                "punctuality" => $request->punctuality,
                "problem_solving" => $request->problem_solving,
                "communication" => $request->communication,
                "professionalism" => $request->professionalism,
                "suitability" => $request->suitability,
                "additional_comments" => $request->additional_comments
            ]);
        } else {
            ReferenceCheck::create([
                "reference_id" => $request->reference_id,
                "duration_capacity" => $request->duration_capacity,
                "performance" => $request->performance,
                "teamwork" => $request->teamwork,
                "punctuality" => $request->punctuality,
                "problem_solving" => $request->problem_solving,
                "communication" => $request->communication,
                "professionalism" => $request->professionalism,
                "suitability" => $request->suitability,
                "additional_comments" => $request->additional_comments
            ]);
        }

        return redirect()->back()->with('success', 'Reference Check Saved Successfully');
    }

    public function referenceQuestionniareShow(Request $request) {
        $reference = InternReference::where('otp', $request->otp)->first();
        $referenceCheck = ReferenceCheck::where('reference_id', $reference?->id)->first();

        //if a reference with the given OTP is not found, return 404.
        if (!$reference) {
            abort(404);
        }

        return view('reference/questionnaire', [
            "reference" => $reference,
            "referenceCheck" => $referenceCheck
        ]); 
    }

    public function referenceQuestionnaireSave(Request $request) {
        $reference = InternReference::where('otp', $request->otp)->first();

        $previousRecord = $referenceCheck = ReferenceCheck::where('reference_id', $request->reference_id)->first();

        $request->validate([
            'reference_id' => 'required',
            'duration_capacity' => 'required',
            'performance' => 'required',
            'teamwork' => 'required',
            'punctuality' => 'required',
            'problem_solving' => 'required',
            'communication' => 'required',
            'professionalism' => 'required',
            'suitability' => 'required'
        ]);

        //create or update the record
        if ($previousRecord) {
            $previousRecord->update([
                "reference_id" => $request->reference_id,
                "duration_capacity" => $request->duration_capacity,
                "performance" => $request->performance,
                "teamwork" => $request->teamwork,
                "punctuality" => $request->punctuality,
                "problem_solving" => $request->problem_solving,
                "communication" => $request->communication,
                "professionalism" => $request->professionalism,
                "suitability" => $request->suitability,
                "additional_comments" => $request->additional_comments
            ]);
        } else {
            ReferenceCheck::create([
                "reference_id" => $request->reference_id,
                "duration_capacity" => $request->duration_capacity,
                "performance" => $request->performance,
                "teamwork" => $request->teamwork,
                "punctuality" => $request->punctuality,
                "problem_solving" => $request->problem_solving,
                "communication" => $request->communication,
                "professionalism" => $request->professionalism,
                "suitability" => $request->suitability,
                "additional_comments" => $request->additional_comments
            ]);
        }

        //deactivate the OTP after updating or creating the questionnaire record
        $reference->update([
            "otpActive" => false
        ]);

        return redirect()->back()->with('success', 'Reference questionnaire saved successfully');
    }
}
