@extends('layouts.backend')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Clocking System</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">In-&-Out</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="pt-3 pb-3">
        <div class="mb-4">
            <a href="{{route('home')}}">&#x2190; Back to dashboard</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-body text-center">
                    <h6 class="card-title mb-3 flex-grow-1 text-center">Time Tracking</h6>
                    <div class="mb-2">
                        <lord-icon src="https://cdn.lordicon.com/kbtmbyzy.json" trigger="loop" colors="primary:#405189,secondary:#02a8b5" style="width:90px;height:90px"></lord-icon>
                    </div>
                    <h3 class="mb-1">{{ date('D - M d, Y') }}</h3>
                    <h5 class="fs-14 mb-4" id="real-time-input">Service Request Date</h5>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            function updateTime() {
                                var now = new Date();
                                var formattedTime = now.getHours() + ':' + now.getMinutes().toString().padStart(2, '0') + ':' + now.getSeconds().toString().padStart(2, '0');
                                document.getElementById('real-time-input').innerText = formattedTime;
                            }

                            // Initial update
                            updateTime();

                            // Update every second
                            setInterval(updateTime, 1000);
                        });
                    </script>

                    <div class="hstack gap-2 justify-content-center">
                        @if ($isClockedIn)
                            <a href="{{ route('clock.out') }}" class="btn btn-danger btn-lg"><i class="ri-stop-circle-line align-bottom me-1"></i> Clock Out</a>
                        @else
                            <a href="{{ route('clock.in') }}" class="btn btn-success btn-lg"><i class="ri-play-circle-line align-bottom me-1"></i> Clock In</a>
                        @endif
                    </div>
                    <div class="mt-4">
                        <h5 class="fs-14 mb-4">Clock In and Out Records <br> <h3>Total time worked: {{ $totalTimeToday }}</h3></h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Clock In Time</th>
                                    <th>Clock Out Time</th>
                                    <th>Duration</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Example data, replace with dynamic data -->
                                @foreach($records as $rec)
                                    <tr>
                                        <td>{{ $rec->created_at->toFormattedDateString() }}</td>
                                        <td>{{ $rec->clock_in }}</td>
                                        <td>{{ $rec->clock_out }}</td>
                                        <td>{{ $rec->duration }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    <!--end row-->
@endsection
