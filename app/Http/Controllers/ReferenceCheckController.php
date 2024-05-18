<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferenceCheck;

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

        return redirect()->route('reference.check.show', ['id' => $request->reference_id])->with('success', 'Reference Check Saved Successfully');
    }
}
