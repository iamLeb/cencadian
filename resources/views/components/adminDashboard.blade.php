<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">Good Morning, {{ auth()->user()->name }}!</h4>
                            <p class="text-muted mb-0">Here's what's happening today.</p>
                        </div>
                        <div class="mt-3 mt-lg-0">
                            <form action="javascript:void(0);">
                                <div class="row g-3 mb-0 align-items-center">
                                    <div class="col-sm-auto">
                                        <div class="input-group">
                                            <input id="real-time-input" type="text" class="form-control border-0 dash-filter-picker shadow" data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y" data-default-date="01 Jan 2022 to 31 Jan 2022">
                                            <div class="input-group-text bg-primary border-primary text-white">
                                                <i class="ri-calendar-2-line"></i>
                                            </div>
                                        </div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                function updateTime() {
                                                    var now = new Date();
                                                    var formattedTime = now.toLocaleString('default', { month: 'short' }) + ' ' + now.getDate() + ', ' + now.getFullYear() + ' | ' + now.getHours() + ':' + now.getMinutes().toString().padStart(2, '0') + ':' + now.getSeconds().toString().padStart(2, '0');;
                                                    document.getElementById('real-time-input').value = formattedTime;
                                                }

                                                // Initial update
                                                updateTime();

                                                // Update every second
                                                setInterval(updateTime, 1000);
                                            });
                                        </script>

                                    </div>
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> No. of Companies</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ \App\Models\User::where('type', 'company')->count() }}">{{ \App\Models\User::where('type', 'company')->count() }}</span> </h4>
                                    <a href="{{ route('admin.companies') }}" class="text-decoration-underline">View Companies</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success rounded fs-3">
                                        <i class="bx bx-dollar-circle"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">No. of Companies Proposals.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ \App\Models\ServiceRequest::count() }}">{{ \App\Models\Application::count() }}</span></h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info rounded fs-3">
                                        <i class="bx bx-layer"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">No. of Interns</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ \App\Models\User::where('type', 'intern')->count() }}">{{ \App\Models\User::where('type', 'intern')->count() }}</span></h4>
                                    <a href="{{ route('admin.interns') }}" class="text-decoration-underline">View Interns</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info rounded fs-3">
                                        <i class="bx bx-user"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">No. of Intern Application</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ \App\Models\Application::count() }}">{{ \App\Models\Application::count() }}</span></h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info rounded fs-3">
                                        <i class="bx bx-layer"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div> <!-- end row-->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Companies Request</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                    <tbody>
                                    @foreach(\App\Models\User::where('type', 'company')->get() as $company)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm bg-light rounded p-1 me-2">
                                                        <img src="https://ui-avatars.com/api/?name={{ $company->name }}" alt="" class="img-fluid d-block" />
                                                    </div>
                                                    <div>
                                                        <h5 class="fs-14 my-1"><a class="text-reset">{{ ucfirst($company->name) }}</a></h5>
                                                        <span class="text-muted">{{ $company->email }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="fs-14 my-1 fw-normal">Joined on {{ $company->created_at->toFormattedDateString() }}</h5>
                                            </td>

                                            @if(count($company->serviceRequest))
                                                <td>
                                                    <a href="{{ route('admin.company.show', $company->serviceRequest->first()->id ) }}" class="btn btn-primary">View</a>
                                                </td>
                                            @else
                                                <td>
                                                    <button class="btn">No Request Yet</button>
                                                </td>
                                            @endif


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Interns</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                                    <tbody>
                                    @foreach(\App\Models\User::where('type', 'intern')->get() as $intern)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="https://ui-avatars.com/api/?name={{ $intern->name }}" alt="" class="avatar-sm p-2" />
                                                    </div>
                                                    <div>
                                                        <h5 class="fs-14 my-1 fw-medium">
                                                            <a href="{{ route('admin.intern.show', $intern->id) }}" class="text-reset">{{ $intern->name }}</a>
                                                        </h5>
                                                        <span class="text-muted">{{ $intern->email }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-muted">Joined on {{ $intern->created_at->toFormattedDateString() }}</span>
                                            </td>

                                            <td>
                                                <h5 class="fs-14 mb-0"><i class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i></h5>
                                            </td>
                                        </tr><!-- end -->
                                    @endforeach
                                    </tbody>
                                </table><!-- end table -->
                            </div>
                        </div> <!-- .card-body-->
                    </div> <!-- .card-->
                </div> <!-- .col-->
            </div> <!-- end row-->

        </div> <!-- end .h-100-->

    </div> <!-- end col -->

</div>
