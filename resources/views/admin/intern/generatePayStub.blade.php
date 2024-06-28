@extends('layouts.backend')
@section('content')

    <!--Page title-->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Generate Pay Stub</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href={{route('admin.interns')}}>Interns</a></li>
                        <li class="breadcrumb-item"><a href={{route('admin.intern.show', ['id' => $employee_id])}}>{{$employee_name}}</a></li>
                        <li class="breadcrumb-item"><a href="{{url()->previous()}}">Review Timesheet</a></li>
                        <li class="breadcrumb-item active">Generate Pay Stub</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- End page title -->

    <div class="d-print-none mb-4">
        <a href="{{url()->previous()}}">&#x2190; Back to timesheet</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('submit.pay.stub', ['id' => $employee_id])}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <h1 class="mb-4">Earnings Statement Preview</h1>

                            <h3>Company Details</h3>

                            <div class="form-group row mb-3">
                                <label for="company-name-input" class="col-sm-2 col-form-label text-sm-end">Company Name:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="company_name" type="text" id="company-name-input" value="{{$company_name}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="company-address-input" class="col-sm-2 col-form-label text-sm-end">Address:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="company_address" type="text" id="company-address-input" value="{{$company_address}}" readonly/>
                                </div>
                            </div>

                            <h3>Employee Information</h3>

                            <div class="form-group row mb-3">
                                <label for="employee-name-input" class="col-sm-2 col-form-label text-sm-end">Name:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="employee_name" type="text" id="employee-name-input" value="{{$employee_name}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="employee-address-input" class="col-sm-2 col-form-label text-sm-end">Address:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="employee_address" type="text" id="employee-address-input" value="{{$employee_address}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="employee-id-input" class="col-sm-2 col-form-label text-sm-end">Employee ID:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="employee_number" type="text" id="employee-id-input" value="{{$employee_number}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="employee-sin-input" class="col-sm-2 col-form-label text-sm-end">SIN:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="employee_sin" type="text" id="employee-sin-input" value="{{$employee_sin}}" readonly/>
                                </div>
                            </div>

                            <h3>Pay Period</h3>
                            
                            <div class="form-group row mb-3">
                                <label for="pay-period-start-input" class="col-sm-2 col-form-label text-sm-end">Starting:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="pay_period_start" type="date" id="pay-period-start-input" value={{$pay_period_start}} readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="pay-period-end-input" class="col-sm-2 col-form-label text-sm-end">Ending:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="pay_period_end" type="date" id="pay-period-end-input" value={{$pay_period_end}} readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="pay-date-input" class="col-sm-2 col-form-label text-sm-end">Pay Date</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="pay_date" type="date" id="pay-date-input" value="{{$pay_date}}" readonly/>
                                </div>
                            </div>

                            <h3>Earnings</h3>

                            <div class="form-group row mb-3">
                                <label for="hourly-rate-input" class="col-sm-2 col-form-label text-sm-end">Hourly Rate:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="hourly_rate" type="text" id="hourly-rate-input" value="{{formatTwoDecimal($hourly_rate)}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="hours-worked-input" class="col-sm-2 col-form-label text-sm-end">Hours:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="hours_worked" type="text" id="hours-worked-input" value="{{$hours_worked}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="total-wages-input" class="col-sm-2 col-form-label text-sm-end">Total Wages:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="total_wages" type="text" id="total-wages-input" value="{{formatTwoDecimal($total_wages)}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="vacation-pay-input" class="col-sm-2 col-form-label text-sm-end">4% Vacation Pay:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="vacation_pay" type="text" id="vacation-pay-input" value="{{formatTwoDecimal($vacation_pay)}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="gross-pay-input" class="col-sm-2 col-form-label text-sm-end">Gross Pay:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="gross_pay" type="text" id="gross_pay_input" value="{{formatTwoDecimal($gross_pay)}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="ytd-earnings-input" class="col-sm-2 col-form-label text-sm-end">YTD Earnings:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="ytd_earnings" type="text" id="ytd-earnings-input" value="{{formatTwoDecimal($ytd_earnings)}}" readonly/>
                                </div>
                            </div>

                            <h3>Deductions</h3>
                            
                            <div class="form-group row mb-3">
                                <label for="federal-tax-input" class="col-sm-2 col-form-label text-sm-end">Federal Tax:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="federal_tax" type="number" id="federal-tax-input" value="{{formatTwoDecimal($federal_tax)}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="provincial-tax-input" class="col-sm-2 col-form-label text-sm-end">Provincial Tax:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="provincial_tax" type="number" id="provincial-tax-input" value="{{formatTwoDecimal($provincial_tax)}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="cpp-deduction-input" class="col-sm-2 col-form-label text-sm-end">CPP:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="cpp_deduction" type="number" id="cpp-deduction-input" value="{{formatTwoDecimal($cpp_deduction)}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="ei-deduction-input" class="col-sm-2 col-form-label text-sm-end">EI:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="ei_deduction" type="number" id="ei-deduction-input" value="{{formatTwoDecimal($ei_deduction)}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="total-deductions-input" class="col-sm-2 col-form-label text-sm-end">Total Deductions:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="total_deductions" type="number" step="0.01" id="total-deductions-input" value="{{formatTwoDecimal($total_deductions)}}" readonly/>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label for="ytd-deductions-input" class="col-sm-2 col-form-label text-sm-end">YTD Deductions:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="ytd_deductions" type="number" id="ytd-deductions-input" value="{{formatTwoDecimal($ytd_deductions)}}" readonly/>
                                </div>
                            </div>

                            <h3>Net Pay</h3>
                            
                            <div class="form-group row mb-3">
                                <label for="net-pay" class="col-sm-2 col-form-label text-sm-end">Net pay this period:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="net_pay" type="number" id="net-pay-input" value="{{formatTwoDecimal($net_pay)}}" readonly/>
                                </div>
                            </div>

                            <h3>Year to Date</h3>

                            <div class="form-group row mb-3">
                                <label for="gross-ytd" class="col-sm-2 col-form-label text-sm-end">Year to date gross:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="gross_ytd" type="number" id="gross-ytd" value="{{formatTwoDecimal($ytd_earnings)}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="deductions-ytd" class="col-sm-2 col-form-label text-sm-end">Year to date deductions:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="deductions_ytd" type="number" id="deductions-ytd" value="{{formatTwoDecimal($ytd_deductions)}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="net-pay-ytd" class="col-sm-2 col-form-label text-sm-end">Year to date net pay:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="ytd_net_pay" type="number" id="net-pay-ytd" value="{{formatTwoDecimal($ytd_net_pay)}}" readonly/>
                                </div>
                            </div>

                            <input type="hidden" name="employee_id" value="{{$employee_id}}"/>

                            <button type="submit" class="btn btn-warning btn-lg w-100"><i class="mdi mdi-cash"></i> Submit Pay Stub</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
