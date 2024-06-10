@php
    use Carbon\Carbon;
@endphp

@extends('layouts.backend')
@section('content')

    <!--Page title-->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Review Timesheet</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href={{route('admin.interns')}}>Interns</a></li>
                        <li class="breadcrumb-item"><a href={{route('admin.intern.show', ['id' => $clockRecord->user->id])}}>{{$clockRecord->user->name}}</a></li>
                        <li class="breadcrumb-item"><a href={{route('review.timesheet', ['id' => $clockRecord->user->id])}}>Review Timesheet</a></li>
                        <li class="breadcrumb-item active">Edit Timesheet Entry</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- End page title -->

    <div class="mb-4">
        <a href={{route('review.timesheet', ['id' => $clockRecord->user->id])}}>&#x2190; Back to timesheet</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="POST", action="{{route('edit.clock.entry', ['id' => $clockRecord->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h3>Intern name: {{$clockRecord->user->name}}</h3>

                            <h6>Edit Clock Record</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Clock In Time</th>
                                        <th>Clock Out Time</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="clock-entries">
                                        <tr>
                                            <td>
                                                <input name="clock_in" class="form-control" type="text" value="{{ $clockRecord->clock_in }}"/>
                                            </td>


                                            <td>
                                                <input name="clock_out" class="form-control" type="text" value="{{ $clockRecord->clock_out }}"/>
                                            </td>

                                            <td class="d-flex justify-content-around gap-2">
                                                <button class="btn btn-success">Save Changes</button>                                                                            
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection