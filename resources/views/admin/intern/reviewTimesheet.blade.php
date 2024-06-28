@extends('layouts.backend')
@section('content')

    @php
        //this should be moved outside the view
        use Carbon\CarbonInterval;
        use Carbon\Carbon;

        $timeWorked = CarbonInterval::create();

        foreach ($clockRecords as $rec) {
            $timeWorked = $timeWorked->add($rec->carbonInterval);
        }
        //Could make this a column of the user table later, as of now all interns are paid the same rate.
        $HOURLY_RATE = 15.30;

        $hoursWorked = round(($timeWorked->dayz * 24) + ($timeWorked->hours) + (0.01666 * $timeWorked->seconds), 0);

        //force cap of 60 hours per pay period
        if ($hoursWorked > 60) {
            $hoursWorked = 60;
        }

        $wagePay = round($hoursWorked * $HOURLY_RATE, 2);
        $vacationPay = round($wagePay * 0.04, 2);
        $grossPay = $wagePay + $vacationPay;
    @endphp

    <!--Page title-->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Review Timesheet</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href={{route('admin.interns')}}>Interns</a></li>
                        <li class="breadcrumb-item"><a href={{route('admin.intern.show', ['id' => $intern->id])}}>{{$intern->name}}</a></li>
                        <li class="breadcrumb-item active">Review Timesheet</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- End page title -->

    <div class="mb-4">
        <a href={{route('admin.intern.show', ['id' => $intern->id])}}>&#x2190; Back to intern profile</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Intern name: {{$intern->name}}</h3>

                        <h6>Select Pay Period</h3>

                        <form method="GET" action={{route('review.timesheet', ['id' => $intern->id])}} enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label" for="">Starting</label>
                                        <input name="start" type="date" class="form-control mb-2" value="{{$start}}"/>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label" for="">Ending</label>
                                        <input name="end" type="date" class="form-control mb-4" value="{{$end}}"/>
                                    </div>

                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-filter"></i> Get clock entries</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">All clock-in records</h3>

                        <a href={{route('show.create.clock.entry', ['id' => $intern->id])}} class="btn btn-success mb-3"> + Add clock-in record</a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Clock In Time</th>
                                    <th>Clock Out Time</th>
                                    <th>Duration</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody id="clock-entries">

                                @if ($start and $end)
                                    @foreach($clockRecords as $rec)
                                        <tr>
                                            <td>{{ Carbon::parse($rec->clock_in)->toFormattedDateString() }}</td>
                                            <td>{{ Carbon::parse($rec->clock_in)->toTimeString() }}</td>
                                            <td>{{ Carbon::parse($rec->clock_out)->toTimeString() }}</td>
                                            <td>{{ $rec->carbonInterval }}</td>
                                            <td class="d-flex justify-content-around gap-2">
                                                <a href={{route('show.edit.clock.entry', ['id' => $rec->id])}} class="btn btn-link"><i class="mdi mdi-file-edit-outline"></i></a>
                                                <a onclick="return confirm('Are you sure you want to delete this clock record?')" href="{{route('delete.clock.entry', ['id' => $rec->id])}}" class="btn btn-link"><i class="mdi mdi-trash-can-outline"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="100%" class="fw-bold text-center">Select a start and end pay period to view clock entries</td>
                                    </tr>
                                @endif

                                @if (!$clockRecords or !count($clockRecords))
                                    <tr>
                                        <td class="fw-bold text-center" colspan="100%">No clock records found!</td>
                                    </tr>
                                @endif

                                </tbody>

                                @if ($start and $end and $clockRecords)
                                    <tfoot class="table-light">
                                        <tr>
                                            <td class="fw-bold" colspan="3">TOTAL:</td>

                                            <td colspan="2" class="text-decoration-underline">{{$hoursWorked}} Hours</td>
                                        </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>

                @if ($start and $end and $clockRecords)
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('show.generate.pay.stub', ['id' => $intern->id])}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <h1 class="mb-4">Earnings Statement Preview</h1>

                            <h3>Company Details</h3>

                            <div class="form-group row mb-3">
                                <label for="company-name-input" class="col-sm-2 col-form-label text-sm-end">Company Name:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input required class="form-control col" name="company_name" type="text" id="company-name-input" value="Cencadian Educational Incorporated"/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="company-address-input" class="col-sm-2 col-form-label text-sm-end">Address:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input required class="form-control col" name="company_address" type="text" id="company-address-input" value="262 Tanager Trail, Winnipeg, MB, R3X 0P8"/>
                                </div>
                            </div>

                            <h3>Employee Information</h3>

                            <div class="form-group row mb-3">
                                <label for="employee-name-input" class="col-sm-2 col-form-label text-sm-end">Name:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="employee_name" type="text" id="employee-name-input" value="{{$intern->name}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="employee-address-input" class="col-sm-2 col-form-label text-sm-end">Address:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="employee_address" type="text" id="employee-address-input" value="{{$intern->address}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="employee-id-input" class="col-sm-2 col-form-label text-sm-end">Employee ID:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="employee_number" type="text" id="employee-id-input" value="{{$intern->employee_number}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="employee-sin-input" class="col-sm-2 col-form-label text-sm-end">SIN:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="employee_sin" type="text" id="employee-sin-input" value="000 000 000" readonly/>
                                </div>
                            </div>

                            <h3>Pay Period</h3>
                            
                            <div class="form-group row mb-3">
                                <label for="pay-period-start-input" class="col-sm-2 col-form-label text-sm-end">Starting:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="pay_period_start" type="date" id="pay-period-start-input" value={{$start}} readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="pay-period-end-input" class="col-sm-2 col-form-label text-sm-end">Ending:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="pay_period_end" type="date" id="pay-period-end-input" value={{$end}} readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="pay-date-input" class="col-sm-2 col-form-label text-sm-end">Pay Date</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input required value="{{old('pay_date')}}"class="form-control col" name="pay_date" type="date" id="pay-date-input" placeholder="Enter pay date"/>
                                </div>
                            </div>

                            <h3>Earnings</h3>

                            <div class="form-group row mb-3">
                                <label for="hourly-rate-input" class="col-sm-2 col-form-label text-sm-end">Hourly Rate:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="hourly_rate" type="text" id="hourly-rate-input" value={{formatTwoDecimal($HOURLY_RATE)}} readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="hours-worked-input" class="col-sm-2 col-form-label text-sm-end">Hours:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="hours_worked" type="text" id="hours-worked-input" value="{{$hoursWorked}}"/>
                                    <button type="button" id="override-hours-button" class="btn btn-sm btn-warning">Override</button>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="total-wages-input" class="col-sm-2 col-form-label text-sm-end">Total Wages:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="total_wages" type="text" id="total-wages-input" value={{formatTwoDecimal($wagePay)}} readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="vacation-pay-input" class="col-sm-2 col-form-label text-sm-end">4% Vacation Pay:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="vacation_pay" type="text" id="vacation-pay-input" value={{formatTwoDecimal($vacationPay)}} readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="gross-pay-input" class="col-sm-2 col-form-label text-sm-end">Gross Pay:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="gross_pay" type="text" id="gross-pay-input" value={{formatTwoDecimal($grossPay)}} readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="ytd-earnings-input" class="col-sm-2 col-form-label text-sm-end">YTD Earnings:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="ytd_earnings" type="text" id="ytd-earnings-input" placeholder="(CALCULATED)" readonly/>
                                </div>
                            </div>

                            <h3>Deductions</h3>
                            
                            <div class="form-group row mb-3">
                                <label for="federal-tax-input" class="col-sm-2 col-form-label text-sm-end">Federal Tax:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input required value="{{old('federal_tax')}}" class="form-control col" name="federal_tax" type="number" step="0.01" id="federal-tax-input" placeholder="Enter federal tax deduction"/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="provincial-tax-input" class="col-sm-2 col-form-label text-sm-end">Provincial Tax:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input required value="{{old('provincial_tax')}}" class="form-control col" name="provincial_tax" type="number" step="0.01" id="provincial-tax-input" placeholder="Enter provincial tax deduction"/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="cpp-deduction-input" class="col-sm-2 col-form-label text-sm-end">CPP:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input required value="{{old('cpp_deduction')}}" class="form-control col" name="cpp_deduction" type="number" step="0.01" id="cpp-deduction-input" placeholder="Enter CPP deduction"/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="ei-deduction-input" class="col-sm-2 col-form-label text-sm-end">EI:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input required value="{{old('ei_deduction')}}" class="form-control col" name="ei_deduction" type="number" step="0.01" id="ei-deduction-input" placeholder="Enter EI deduction"/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="total-deductions-input" class="col-sm-2 col-form-label text-sm-end">Total Deductions:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input value="{{old('total_deductions')}}" class="form-control col" name="" type="number" step="0.01" id="ei-deduction-input" placeholder="(CALCULATED)" readonly/>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label for="ytd-deductions-input" class="col-sm-2 col-form-label text-sm-end">YTD Deductions:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="" type="number" step="0.01" id="ytd-deductions-input" placeholder="(CALCULATED)" readonly/>
                                </div>
                            </div>

                            <h3>Net Pay</h3>
                            
                            <div class="form-group row mb-3">
                                <label for="net-pay" class="col-sm-2 col-form-label text-sm-end">Net pay this period:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="net_pay" type="number" id="net-pay-input" placeholder="(CALCULATED)" readonly/>
                                </div>
                            </div>

                            <h3>Year to Date</h3>

                            <div class="form-group row mb-3">
                                <label for="gross-ytd" class="col-sm-2 col-form-label text-sm-end">Year to date gross:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="gross_ytd" type="number" id="gross-ytd" placeholder="(CALCULATED)" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="deductions-ytd" class="col-sm-2 col-form-label text-sm-end">Year to date deductions:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="" type="number" id="deductions-ytd" placeholder="(CALCULATED)" readonly/>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="net-pay-ytd" class="col-sm-2 col-form-label text-sm-end">Year to date net pay:</label>
                                <div class="col-sm-6 col-xl-4">
                                    <input class="form-control col" name="" type="number" id="net-pay-ytd" placeholder="(CALCULATED)" readonly/>
                                </div>
                            </div>

                            <input type="hidden" name="employee_id" value="{{$intern->id}}">

                            <button type="submit" class="btn btn-success btn-lg w-100"><i class="mdi mdi-cash"></i> Generate Pay Stub</button>
                            </form>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function overrideHoursWorked() {
            console.log("Overriding hours worked");
            const hourlyRate = {{$HOURLY_RATE}}

            const numHoursInput = document.querySelector("#hours-worked-input");
            const numHours = numHoursInput.value;

            const totalWagesInput = document.querySelector("#total-wages-input");
            const vacationPayInput = document.querySelector("#vacation-pay-input");
            const grossPayInput = document.querySelector("#gross-pay-input");
            
            const totalWages = numHours * hourlyRate;
            const vacationPay = totalWages * 0.04
            const grossPay = totalWages + vacationPay

            totalWagesInput.value = totalWages.toFixed(2);
            vacationPayInput.value = vacationPay.toFixed(2);
            grossPayInput.value = grossPay.toFixed(2);
        }

        const overrideHoursButton = document.querySelector("#override-hours-button");
        overrideHoursButton.addEventListener('click', overrideHoursWorked);
    </script>

@endsection
