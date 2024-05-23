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
                    <img src="https://ui-avatars.com/api/?name={{ $user->name }}" alt="user-img" class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{ $user->name }}</h3>
                    <p class="text-white text-opacity-75">{{ $user->email }}</p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>{{ $user->address ?? 'NA'}}</div>
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

                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Documents</span>
                            </a>
                        </li>
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
                                                    <td class="text-muted">{{ $user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Mobile:</th>
                                                    <td class="text-muted">{{ $user->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">E-mail:</th>
                                                    <td class="text-muted">{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Location:</th>
                                                    <td class="text-muted">{{ $user->address }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Joined:</th>
                                                    <td class="text-muted">{{ $user->created_at->toFormattedDateString() }}</td>
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
                                            @if ($user->application)
                                                @foreach(explode(',', $user->application->skills) as $skill)
                                                    <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">{{ $skill }}</a>
                                                @endforeach
                                            @endif

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
                                                <h5 class="card-title mb-3">Application Info</h5>
                                            </div>
                                            @php
                                                $mailTo =
                                                "mailto:$user->email
                                                ?subject=Interview Invitation
                                                &body=Cencadian Educational Incorporated%0D%0A " .date('M d, Y') . " %0D%0A $user->name | $user->address %0D%0A%0D%0ADear $user->name,%0D%0A%0D%0AWe are pleased to inform you that after reviewing your application for the Web Development Intern position, we would like to invite you to participate in an interview for this position. We believe your skills and experiences could be a good match for our team, and we would like to learn more.%0D%0A%0D%0AInterview Details:%0D%0A• Date: [Interview Date]%0D%0A• Time: [Interview Time]%0D%0A• Location: 262 Tanager Trail, Winnipeg, MB%0D%0A• Expected Duration: About 1 hour%0D%0A%0D%0AThe interview will cover your professional background, your skills, and your possible fit within our team. Additionally, this will be a great opportunity for you to learn more about our company’s culture, the specifics of the role, and the impact you can make at Cencadian.%0D%0A%0D%0ADo not hesitate to contact us at admin@cencadian.ca if you have any questions or need further details.%0D%0A%0D%0AThank you for your interest in the Cencadian Summer Web Development Program. Please let us know if you require any special accommodations for your interview.%0D%0A%0D%0ARegards,%0D%0AManagement Team%0D%0ACencadian Educational Incorporated%0D%0A%0D%0A.";
                                            @endphp
                                            <div class="col-md-6">
                                                @if (!$user->interview_mail)
                                                    <a onclick="return confirm('Are you sure you wanna send this email?')" class="btn btn-primary btn-sm" href="{{ $mailTo }}">
                                                        <i class="ri-mail-close-fill"></i> Send Interview</a>
                                                @endif

                                                @if (!$user->interview_question)
                                                    <a onclick="return confirm('Are your sure you wanna send this mail?')" href="" class="btn btn-warning btn-sm">
                                                        <i class="ri-mail-close-fill"></i>Interview Questions
                                                    </a>
                                                @endif

                                                @if (!$user->offer_letter)
                                                    <a onclick="return confirm('Are your sure you wanna send this mail?')" href="{{ route('admin.intern.pdf') }}" class="btn btn-danger btn-sm">
                                                        <i class="ri-mail-close-fill"></i> Send Offer Letter
                                                    </a>
                                                @endif
                                            </div>
                                        </div>

                                        <p>{{ $user->application->note ?? 'No Additional Info'}}</p>
                                        <div class="row mb-5">
                                            <div class="col-6 col-md-4">
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary shadow">
                                                            <i class="ri-user-2-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1">School</p>
                                                        <h6 class="text-truncate mb-0">{{ $user->application->school ?? 'NA' }}</h6>
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

                                                        <p class="mb-1">Application Status</p>
                                                        <h6 class="text-truncate mb-0">{{ ucfirst($user->application->status ?? 'NA') }}</h6>
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
                                                    @if ($user->application)
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Resume</p>
                                                            <a href="https://arabicawhite.s3.amazonaws.com/resume/{{ $user->application->resume }}" class="fw-semibold">{{ __('Resume.pdf') }}</a>
                                                        </div>
                                                    @endif
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
                                                <h5 class="card-title mb-3">References</h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            @if($references)
                                                @foreach($references as $reference)
                                                    <div class="col-md-4 mb-3">
                                                        <h5>{{$reference->name}}</h5>


                                                        <p>Relationship: {{$reference->relationship}}</p>
                                                        <p>Organization: {{$reference->org}}</p>
                                                        <p>Phone: {{$reference->phone}}</p>
                                                        <p>Email: {{$reference->email}}</p>
                                                        <p>Preferred contact: {{$reference->prefContact}}</p>

                                                        <p>
                                                            Reference Check Status:
                                                            @if ($reference->referenceCheck)
                                                                <a href="javascript:void(0);" class="badge bg-success">Submitted</a>
                                                            @else
                                                                <a href="javascript:void(0);" class="badge bg-warning">Not Submitted</a>
                                                            @endif
                                                        </p>

                                                        @php
                                                            $applicantName = $user?->name ?? "An applicant";

                                                            $mailtoHref = "mailto:".$reference->email
                                                            ."?subject=Reference Check for $applicantName - Cencadian Summer Web Development Internship Program"
                                                            ."&body="
                                                            ."Hello " . $reference->name . ",%0A%0A"
                                                            ." You have been listed as a reference by " . $applicantName
                                                            ." on their application to the Cencadian Summer Web Development Internship Program. "
                                                            ."Below is a link to a short questionnaire about your experience and relationship with the applicant."
                                                            ."%0A%0A"
                                                            .route('reference.questionnaire.show', ['otp' => $reference->otp])
                                                            ."%0A%0A"
                                                            ."We would appreciate it if you could take 5 minutes to complete this short questionnaire so that we can learn more about the applicant."
                                                            ."%0A%0A"
                                                            ."If you have any questions or concerns, feel free to reply to this email, or contact us at admin@cencadian.ca"
                                                            ."%0A%0A"
                                                            ."Regards,"
                                                            ."%0A"
                                                            ."Management Team"
                                                            ."%0A"
                                                            ."Cencadian Educational Incorporated";


                                                        @endphp


                                                        @if ($reference->referenceCheck)
                                                            <a href="{{$mailtoHref}}" class="btn btn-primary btn-md w-100 mb-3">
                                                                <i class="ri-mail-close-fill"></i> Send Reference Check
                                                            </a>

                                                            <a href="{{route('reference.check.show', ['id' => $reference->id])}}" class="btn btn-success w-100 btn-md">
                                                                <i class="ri-mail-close-fill"></i>View Reference Check
                                                            </a>
                                                        @else
                                                            <a href="{{$mailtoHref}}" class="btn btn-primary btn-md w-100 mb-3">
                                                                <i class="ri-mail-close-fill"></i> Send Reference Check
                                                            </a>

                                                            <a href="{{route('reference.check.show', ['id' => $reference->id])}}" class="btn btn-primary w-100 btn-md">
                                                                <i class="ri-mail-close-fill"></i>Complete Reference Check
                                                            </a>
                                                        @endif


                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="alert alert-danger p-2">Nothing here yet</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>


                    <div class="tab-pane fade" id="documents" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h5 class="card-title flex-grow-1 mb-0">Documents</h5>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-borderless align-middle mb-0">
                                                <thead class="table-light">
                                                <tr>
                                                    <th scope="col">File Name</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Size</th>
                                                    <th scope="col">Upload Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if ($user->application)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 shadow">
                                                                        <i class="ri-file-zip-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h6 class="fs-15 mb-0">
                                                                        <a target="_blank" href="https://arabicawhite.s3.amazonaws.com/resume/{{ $user->application->resume }}">Resume.zip</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>Zip File</td>
                                                        <td>2.07 MB</td>
                                                        <td>{{ $user->application->created_at->toformattedDateString() }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                    @if ($user->application)
                                                                        <li><a class="dropdown-item" target="_blank" href="https://arabicawhite.s3.amazonaws.com/resume/{{ $user->application->resume }}"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center mt-3">
                                            <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end tab-pane-->
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
