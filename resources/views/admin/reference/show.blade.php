@extends('layouts.backend')
@section('content')
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="{{ asset('assets/images/profile-bg.jpg') }}" alt="" class="profile-wid-img" />
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="https://ui-avatars.com/api/?name={{ $reference->name }}" alt="user-img" class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{ $reference->name }}</h3>
                    <p class="text-white text-opacity-75">{{ $reference->email }}</p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>{{ $reference->address ?? 'NA'}}</div>
                    </div>
                </div>
            </div>
            <!--end col-->

        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex profile-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Documents</span>
                            </a>
                        </li> -->
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                <tr>
                                                    <th class="ps-0" scope="row">Full Name:</th>
                                                    <td class="text-muted">{{ $reference->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Mobile:</th>
                                                    <td class="text-muted">{{ $reference->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">E-mail:</th>
                                                    <td class="text-muted">{{ $reference->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Relationship:</th>
                                                    <td class="text-muted">{{ $reference->relationship }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Added:</th>
                                                    <td class="text-muted">{{ $reference->created_at->toFormattedDateString() }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Skills</h5>
                                        <div class="d-flex flex-wrap gap-2 fs-15">

                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->

                            </div>
                            <!--end col-->
                            <div class="col-xxl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="card-title mb-3">Reference Info</h5>
                                            </div>
                                            <div class="col-md-6">
                                                @if (!$reference->interview_mail)
                                                    <a onclick="return confirm('Are your sure you wanna send this mail?')" href="" class="btn btn-primary btn-sm">
                                                        <i class="ri-mail-close-fill"></i> Send Interview
                                                    </a>
                                                @endif

                                                @if (!$reference->interview_question)
                                                    <a onclick="return confirm('Are your sure you wanna send this mail?')" href="" class="btn btn-warning btn-sm">
                                                        <i class="ri-mail-close-fill"></i>Interview Questions
                                                    </a>
                                                @endif

                                                @if (!$reference->offer_letter)
                                                        <a onclick="return confirm('Are your sure you wanna send this mail?')" href="" class="btn btn-danger btn-sm">
                                                            <i class="ri-mail-close-fill"></i> Send Offer Letter
                                                        </a>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- <p>{{ $re->application->note ?? 'No Additional Info'}}</p> -->
                                        <div class="row mb-5">
                                            <div class="col-6 col-md-4">
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary shadow">
                                                            <i class="ri-user-2-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1">Organization</p>
                                                        <h6 class="text-truncate mb-0">{{ $reference->org ?? 'NA' }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-md-4">
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary shadow">
                                                            <i class="ri-global-line"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1">Preferred Contact</p>
                                                        <h6 class="text-truncate mb-0">{{ ucfirst($reference->prefContact ?? 'NA') }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-6 col-md-4">
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary shadow">
                                                            <i class="ri-global-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div><!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <h5 class="card-title mb-3">Reference Questionnaire</h5>
                                            </div>
                                        </div>

                                        @include('components/referenceQuestionnaireForm')
                                            
                                    </div>
                                    <!--end card body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
