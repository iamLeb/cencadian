@extends('layouts.backend')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Service Request</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                        <li class="breadcrumb-item active">Task Details</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <h6 class="card-title mb-3 flex-grow-1 text-start">Time Tracking</h6>
                    <div class="mb-2">
                        <lord-icon src="https://cdn.lordicon.com/kbtmbyzy.json" trigger="loop" colors="primary:#405189,secondary:#02a8b5" style="width:90px;height:90px"></lord-icon>
                    </div>
                    <h3 class="mb-1">{{ $sr->created_at->toFormattedDateString() }}</h3>
                    <h5 class="fs-14 mb-4">Service Request Date</h5>
{{--                    <div class="hstack gap-2 justify-content-center">--}}
{{--                        <button class="btn btn-danger btn-sm"><i class="ri-stop-circle-line align-bottom me-1"></i> Stop</button>--}}
{{--                        <button class="btn btn-success btn-sm"><i class="ri-play-circle-line align-bottom me-1"></i> Start</button>--}}
{{--                    </div>--}}
                </div>
            </div>
            <!--end card-->
            <div class="card mb-3">
                <div class="card-body">

                    <div class="table-card">
                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <td class="fw-medium">Name</td>
                                <td>{{ ucfirst($sr->user->name) }}</td>
                            </tr>

                            <tr>
                                <td class="fw-medium">Email</td>
                                <td>{{ ucfirst($sr->user->email) }}</td>
                            </tr>

                            <tr>
                                <td class="fw-medium">Phone</td>
                                <td>{{ ucfirst($sr->user->phone) }}</td>
                            </tr>

                            <tr>
                                <td class="fw-medium">Title</td>
                                <td>{{ ucfirst($sr->title) }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                </div>
            </div>
        </div>
        <!---end col-->
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body">

                    <h3 class="mb-5 text-center">Project title: {{$sr->title}}</h3>

                    <h6 class="mb-3 fw-semibold text-uppercase">Executive Summary</h6>
                    <p class="mb-4">{{ $sr->executive_summary }}</p>

                    <h6 class="mb-3 fw-semibold text-uppercase">Background and rationale</h6>
                    <p class="mb-4">{{ $sr->background_rationale }}</p>

                    <h6 class="mb-3 fw-semibold text-uppercase">Community Involvement</h6>
                    <p class="mb-4">{{ $sr->community_involvement }}</p>

                    <h6 class="mb-3 fw-semibold text-uppercase">Project Requirements</h6>
                    <p class="mb-4">{{ $sr->project_requirements }}</p>

                    <h6 class="mb-3 fw-semibold text-uppercase">Project Team</h6>
                    <p class="mb-4">{{ $sr->project_team }}</p>

                    <h6 class="mb-3 fw-semibold text-uppercase">Budget</h6>
                    <p class="mb-4">{{ $sr->budget }}</p>
                </div>
            </div>
            <!--end card-->

            @if ($sr->file)
            <div class="card">
                <div class="card-header">
                    <div>
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab">
                                    Attachments File
                                </a>
                            </li>
                        </ul>
                        <!--end nav-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <!--end tab-pane-->
                        <div class="tab-pane active" id="messages-1" role="tabpanel">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless align-middle mb-0">
                                    <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">File Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Upload Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm">
                                                    <div class="avatar-title bg-primary-subtle text-primary rounded fs-20">
                                                        <i class="ri-file-zip-fill"></i>
                                                    </div>
                                                </div>

                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="fs-15 mb-0"><a target="_blank" href="https://arabicawhite.s3.amazonaws.com/file/{{ $sr->file }}" class="text-body">Detailed PDF</a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Zip File</td>
                                        <td>2.22 MB</td>
                                        <td>{{ $sr->created_at->toFormattedDateString() }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                        </div>
                        <!--end tab-pane-->
                    </div>
                    <!--end tab-content-->
                </div>
            </div>
            <!--end card-->
            @endif
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 ps-4 bg-success-subtle">
                    <h5 class="modal-title" id="inviteMembersModalLabel">Team Members</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="search-box mb-3">
                        <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                        <i class="ri-search-line search-icon"></i>
                    </div>

                    <div class="mb-4 d-flex align-items-center">
                        <div class="me-2">
                            <h5 class="mb-0 fs-13">Members :</h5>
                        </div>
                        <div class="avatar-group justify-content-center">
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Tonya Noble">
                                <div class="avatar-xs">
                                    <img src="assets/images/users/avatar-10.jpg" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Thomas Taylor">
                                <div class="avatar-xs">
                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy Martino">
                                <div class="avatar-xs">
                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                        <div class="vstack gap-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Nancy Martino</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-danger-subtle text-danger rounded-circle">
                                        HB
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Henry Baird</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Frank Hook</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Jennifer Carter</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                        AC
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Alexis Clarke</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Joseph Parker</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                        </div>
                        <!-- end list -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light w-xs" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success w-xs">Assigned</button>
                </div>
            </div>
            <!-- end modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- end modal -->
@endsection
