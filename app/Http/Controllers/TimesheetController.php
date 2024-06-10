<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Interview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ClockInOut;
use Carbon\Exceptions\InvalidFormatException;

class TimesheetController extends Controller {

    public function showGeneratePayStub(Request $request) {
        $intern = User::where('id', $request->id)->first();
        $clockRecords = $intern->clock->whereNotNull('clock_out');

        return view('admin/intern/generatePayStub', [
            'intern' => $intern,
            'clockRecords' => $clockRecords
        ]);
    }

    public function reviewTimesheet(Request $request) {
        $intern = User::where('id', $request->id)->first();
        
        $clockRecords = $intern->clock->whereNotNull('clock_out');

        //if the querystring specifies start and end dates, use them to filter the results
        if ($request->start) {
            $clockRecords = $clockRecords->where('clock_in', '>=', $request->start);
        }

        if ($request->end) {
            $clockRecords = $clockRecords->where('clock_in', '<=', $request->end);
        }

        return view('admin/intern/reviewTimesheet', [
            'intern' => $intern,
            'clockRecords' => $clockRecords,
            'start' => $request->start,
            'end' => $request->end
        ]);
    }

    public function showEditClockEntry(Request $request) {
        $request->validate([
            'id' => 'exists:clock_in_outs,id'
        ]);

        $clockRecord = ClockInOut::where('id', $request->id)->first();

        return view('admin/intern/editClockEntry', [
            'clockRecord' => $clockRecord
        ]);     
    }

    public function editClockEntry(Request $request) {
        $request->validate([
            'id' => 'exists:clock_in_outs,id'
        ]);

        $clockRecord = ClockInOut::where('id', $request->id)->first();

        try {
            $clockInTime = Carbon::parse($request->clock_in);
            $clockOutTime = Carbon::parse($request->clock_out);
        } catch (InvalidFormatException | Exception $e) {
            return redirect()->back()->with('error', 'Invalid clock in or clock out time');
        }

        $clockRecord->update([
            'clock_in' => $clockInTime,
            'clock_out' => $clockOutTime
        ]);

        return redirect(route('review.timesheet', ['id' => $clockRecord->user->id]))->with('success', 'Clock record updated successfully');
    }

    public function deleteClockEntry(Request $request) {
        $request->validate([
            'id' => 'exists:clock_in_outs,id'
        ]);

        $recordToDelete = ClockInOut::where('id', $request->id)->first();

        $recordToDelete->delete();

        return redirect()->back()->with('success', 'Clock record deleted successfuly.');
    }

    public function showCreateClockEntry(Request $request) {
        $intern = User::where('id', $request->id)->first();

        return view('admin/intern/createClockEntry', [
            'intern' => $intern
        ]);
    }

    public function createClockEntry(Request $request) {
        $request->validate([
            'clock_in' => 'required|string',
            'clock_out' => 'required|string',
            'id' => 'exists:users,id'
        ]);

        try {
            $clockInTimestamp = Carbon::parse($request->clock_in);
            $clockOutTimestamp = Carbon::parse($request->clock_out);
        } catch (InvalidFormatException | Exception $e) {
            return redirect()->back()->with('error', 'Invalid start or end timestamp');
        }

        ClockInOut::create([
            'clock_in' => $request->clock_in,
            'clock_out' => $request->clock_out,
            'user_id' => $request->id
        ]);

        return redirect()->route('review.timesheet', ['id' => $request->id])->with('success', 'Clock-in entry created succesfully');
    }
}