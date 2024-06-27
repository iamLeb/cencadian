<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Interview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\PayStub;
use App\Models\ClockInOut;
use Carbon\Exceptions\InvalidFormatException;

class TimesheetController extends Controller {

    public function showGeneratePayStub(Request $request) {
        //ADD VALIDATION

       //calculate total deductions for this pay period
       $total_deductions = $request->federal_tax + $request->provincial_tax + $request->cpp_deduction + $request->ei_deduction; 

        //calculate ytd amounts based on previous pay stubs and amounts given on the new pay stub.
        $ytd_earnings_before_current = DB::table('pay_stubs')->where('employee_id', $request->employee_id)->sum('gross_pay');
        $ytd_deductions_before_current = DB::table('pay_stubs')->where('employee_id', $request->employee_id)->sum('total_deductions');
        
        $ytd_earnings = round($ytd_earnings_before_current + $request->gross_pay, 2);
        $ytd_deductions = round($ytd_deductions_before_current + $total_deductions, 2);
        $ytd_net_pay = round($ytd_earnings - $ytd_deductions, 2);

        //dd($request);

        return view('admin/intern/generatePayStub', [
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'employee_name' => $request->employee_name,
            'employee_address' => $request->employee_address,
            'employee_id' => $request->employee_id,
            'employee_sin' => $request->employee_sin,
            'pay_period_start' => $request->pay_period_start,
            'pay_period_end' => $request->pay_period_end,
            'pay_date' => $request->pay_date,
            'hourly_rate' => $request->hourly_rate,
            'hours_worked' => $request->hours_worked,
            'total_wages' => $request->total_wages,
            'vacation_pay' => $request->vacation_pay,
            'gross_pay' => $request->gross_pay,
            'ytd_earnings' => $ytd_earnings,
            'federal_tax' => $request->federal_tax,
            'provincial_tax' => $request->provincial_tax,
            'cpp_deduction' => $request->cpp_deduction,
            'ei_deduction' => $request->ei_deduction,
            'total_deductions' => $total_deductions,
            'ytd_deductions' => $ytd_deductions,
            'ytd_net_pay' => $ytd_net_pay
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
            $clockRecords = $clockRecords->where('clock_in', '<=', date('Y-m-d', strtotime($request->end . ' + 1 days')));
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

    public function submitPayStub(Request $request) {
        PayStub::create([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'employee_name' => $request->employee_name,
            'employee_address' => $request->employee_address,
            'employee_id' => $request->employee_id,
            'employee_sin' => $request->employee_sin,
            'pay_period_start' => $request->pay_period_start,
            'pay_period_end' => $request->pay_period_end,
            'pay_date' => $request->pay_date,
            'hourly_rate' => $request->hourly_rate,
            'hours_worked' => $request->hours_worked,
            'total_wages' => $request->total_wages,
            'vacation_pay' => $request->vacation_pay,
            'gross_pay' => $request->gross_pay,
            'ytd_earnings' => $request->ytd_earnings,
            'federal_tax' => $request->federal_tax,
            'provincial_tax' => $request->provincial_tax,
            'cpp_deduction' => $request->cpp_deduction,
            'ei_deduction' => $request->ei_deduction,
            'total_deductions' => $request->total_deductions,
            'ytd_deductions' => $request->ytd_deductions,
            'ytd_net_pay' => $request->ytd_net_pay
        ]);

        return redirect(route('admin.intern.show', ['id' => $request->employee_id]))->with('success', 'Pay stub submitted successfuly');
    }

    public function showPayStubs(Request $request) {
        $employee = User::where('id', $request->id)->first();
        $payStubs = PayStub::where('employee_id', $request->id)->get();

        return view('showPayStubs', [
            'employee' => $employee,
            'payStubs' => $payStubs
        ]);
    }

    public function showMyPay(Request $request) {
        $user = User::where('id', auth()->user()->id)->first();
        $payStubs = PayStub::where('employee_id', auth()->user()->id)->get();

        return view('showPayStubs', [
            'employee' => $user,
            'payStubs' => $payStubs
        ]);
    }
}