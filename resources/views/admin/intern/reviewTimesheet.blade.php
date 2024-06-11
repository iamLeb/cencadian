@extends('layouts.backend')
@section('content')

    @php
        use Carbon\CarbonInterval;
        use Carbon\Carbon;

        $timeWorked = CarbonInterval::create();

        foreach ($clockRecords as $rec) {
            $timeWorked = $timeWorked->add($rec->carbonInterval);
        }
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

                                    <button type="submit" class="btn btn-primary">Filter</button>
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

                                @foreach($clockRecords as $rec)
                                    <tr>
                                        <td>{{ $rec->created_at->toFormattedDateString() }}</td>
                                        <td>{{ Carbon::parse($rec->clock_in)->toTimeString() }}</td>
                                        <td>{{ Carbon::parse($rec->clock_out)->toTimeString() }}</td>
                                        <td>{{ $rec->carbonInterval }}</td>
                                        <td class="d-flex justify-content-around gap-2">
                                            <a href={{route('show.edit.clock.entry', ['id' => $rec->id])}} class="btn btn-link"><i class="mdi mdi-file-edit-outline"></i></a>
                                            <a onclick="return confirm('Are you sure you want to delete this clock record?')" href="{{route('delete.clock.entry', ['id' => $rec->id])}}" class="btn btn-link"><i class="mdi mdi-trash-can-outline"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                @if (!$clockRecords or !count($clockRecords))
                                    <tr>
                                        <td class="fw-bold text-center" colspan="100%">No clock records found!</td>
                                    </tr>
                                @endif

                                </tbody>

                                <tfoot class="table-light">
                                    <tr>
                                        <td class="fw-bold" colspan="3">TOTAL:</td>

                                        <td colspan="2" class="text-decoration-underline">{{round(($timeWorked->dayz * 24) + ($timeWorked->hours) + (0.01666 * $timeWorked->seconds), 2)}} Hours</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
