<?php

namespace App\Http\Controllers;

use App\Models\ClockInOut;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        // Check if the user has clocked in today
        $clockedInToday = $user->clock()
            ->whereDate('created_at', Carbon::today())
            ->exists();

        // Check if the user has clocked out today
        $clockedOutToday = $user->clock()
                    ->whereDate('clock_out', Carbon::today())
                    ->exists();

        return view('hired.clock', [
            'clockedInToday' => $clockedInToday,
            'clockedOutToday' => $clockedOutToday,
            'records' => auth()->user()->clock,
        ]);
    }

    public function clockIn()
    {
        auth()->user()->clock()->create([
            'clock_in' => now()
        ]);

        return redirect()->back()->with('success', 'Clocked in successfully!');
    }

    public function clockOut()
    {
        $attendance = ClockInOut::where('user_id', auth()->id())->whereNull('clock_out')->first();
        if ($attendance) {
            $attendance->update(
                [
                    'clock_out' => now(),
                    'duration' => $attendance->duration
                ]
            );
            return redirect()->back()->with('success', 'Clocked out successfully!');
        }

        return redirect()->back()->with('error', 'You need to clock in first!');
    }
}
