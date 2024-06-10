<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $accessibleDocuments = [];
        $ownedDocuments = [];

        if (auth()->user()->ownedDocuments) {
            $ownedDocuments = auth()->user()->ownedDocuments;

            foreach (auth()->user()->documentAccesses as $documentAccess) {
                array_push($accessibleDocuments, $documentAccess->document);
            }
        }

        $totalSeconds = 0;

        if (auth()->user()->isHired()) {
            $result = [];

            foreach (auth()->user()->clock as $clock) {
                $timestamp1 = $clock->clock_in;
                $timestamp2 = $clock->clock_out;

                // Ensure both timestamps are set
                if ($timestamp1 && $timestamp2) {
                    $time1 = Carbon::parse($timestamp1);
                    $time2 = Carbon::parse($timestamp2);

                    $differenceInSeconds = $time1->diffInSeconds($time2);
                    $totalSeconds += $differenceInSeconds;

                    // Convert the difference to hours and minutes
                    $hours = floor($differenceInSeconds / 3600);
                    $minutes = floor(($differenceInSeconds % 3600) / 60);

                    // Format the result as "Xh Ymin"
                    $formattedDifference = "{$hours}h {$minutes}min";

                    $result[] = [
                        'clocked_in' => $timestamp1,
                        'clocked_out' => $timestamp2,
                        'difference_in_seconds' => $differenceInSeconds,
                        'formatted_difference' => $formattedDifference,
                    ];
                }
            }

            // Convert total seconds to hours and minutes
            $totalHours = floor($totalSeconds / 3600);
            $totalMinutes = floor(($totalSeconds % 3600) / 60);
            $formattedTotalHours = "{$totalHours}h {$totalMinutes}min";
        } else {
            $formattedTotalHours = '0h 0min';
        }

        return view('home', [
            'accessibleDocuments' => $accessibleDocuments,
            'ownedDocuments' => $ownedDocuments,
            'totalHours' => $formattedTotalHours
        ]);
    }


    public function profile()
    {
        $references = "";
        if (auth()->user()->application) {
            $references = auth()->user()->application->reference;
        }

        return view('dashboard.profile', [
            'references' => $references
        ]);
    }

    public function profileUpdate(Request $request)
    {
        Auth::user()->update($request->all());
        return redirect()->route('home')->with('success', 'Profile Saved, Please Start Your Application');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
            'new_password_confirmation' => 'required'
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->route('profile')->with('error', 'Incorrect old password');
        }

        Auth::user()->update([
            "password" => Hash::make($request->new_password)
        ]);

        return redirect()->route('profile')->with('success', 'Password updated successfully');
    }

    public function updateCompany(Request $request)
    {
        auth()->user()->update($request->all());
        return redirect()->back()->with('success', 'Profile Updated');
    }

    public function showMyDocuments(Request $request)
    {
        return view('myDocuments');
    }

}
