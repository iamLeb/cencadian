<?php

namespace App\Http\Controllers;

use App\Models\ClockInOut;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClockInOutController extends Controller
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
        $user = auth()->user();
        $attendance = ClockInOut::where('user_id', $user->id)->whereNull('clock_out')->first();

        // Get total time worked
        $totalTimeToday = $this->getTotalTimeToday($user);

        // Check if the user is currently clocked in
        $isClockedIn = $user->clock()->whereNull('clock_out')->exists();

        return view('hired.clock', [
            'isClockedIn' => $isClockedIn,
            'records' => auth()->user()->clock,
            'duration' => $attendance->duration ?? '',
            'totalTimeToday' => $totalTimeToday,
        ]);
    }

    public function clockIn()
    {
        $user = Auth::user();

        // Check if the user is already clocked in
        $openEntry = $user->clock()->whereNull('clock_out')->first();

        if ($openEntry) {
            return redirect()->back()->with('error', 'You are already clocked in.');
        }

        //switch clockedInt column

        auth()->user()->update(['clocked_in' => true]);

        $user->clock()->create([
            'clock_in' => now(),
        ]);

        return redirect()->back()->with('success', 'Clocked in successfully.');
    }

    public function clockOut()
    {
        $user = Auth::user();

        // Find the user's open clock entry
        $openEntry = $user->clock()->whereNull('clock_out')->first();
        if (!$openEntry) {
            return redirect()->back()->with('error', 'You are not clocked in.');
        }

        $openEntry->update([
            'clock_out' => now(),
        ]);

        auth()->user()->update(['clocked_in' => false]);

        return redirect()->back()->with('success', 'Clocked out successfully.');
    }

    private function getTotalTimeToday($user)
    {
        $today = Carbon::today();
        $clockEntries = $user->clock()
            ->whereDate('clock_in', $today)
            ->whereNotNull('clock_out')
            ->get();

        $totalDurationInSeconds = $clockEntries->reduce(function ($carry, $entry) {
            $clockIn = Carbon::parse($entry->clock_in);
            $clockOut = Carbon::parse($entry->clock_out);
            return $carry + $clockIn->diffInSeconds($clockOut);
        }, 0);

        return gmdate('H:i:s', $totalDurationInSeconds);
    }
}
