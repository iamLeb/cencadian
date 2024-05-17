
@extends('layouts.backend')
@section('content')


    @if(auth()->user()->application)
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">We have received your application</h4>
                </div>
            </div>
            <!-- <div class="col-6">
                <div class="page-title-box d-sm-flex align-items-center justify-content-around">
                    <a target="_blank" href="https://arabicawhite.s3.amazonaws.com/resume/{{ auth()->user()->application->resume }}">View Uploaded Resume</a>
                </div>
            </div> -->
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="bg-warning-subtle position-relative">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <h3 class="fw-semibold">Application Submitted Successfully</h3>
                            </div>
                        </div>
                        <div class="shape">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="1440" height="60" preserveAspectRatio="none" viewBox="0 0 1440 60">
                                <g mask="url(&quot;#SvgjsMask1001&quot;)" fill="none">
                                    <path d="M 0,4 C 144,13 432,48 720,49 C 1008,50 1296,17 1440,9L1440 60L0 60z" style="fill: var(--vz-secondary-bg);"></path>
                                </g>
                                <defs>
                                    <mask id="SvgjsMask1001">
                                        <rect width="1440" height="60" fill="#ffffff"></rect>
                                    </mask>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div>
                            <h5 class="fw-semibold">Thank you {{ auth()->user()->name }}!</h5>
                            <p class="text-muted">Thank you for taking the time to apply for the Web Development Internship at The Cencadian Summer Web Development Program. We're thrilled to see your interest in joining our team and contributing to our projects.</p>
                            <p class="text-muted">We're impressed by your skills and enthusiasm, and we're excited about the possibility of working with you. Your application is now under review, and we'll be in touch soon to discuss the next steps in the hiring process.</p>
                            <p class="text-muted">In the meantime, feel free to explore our website and learn more about our company culture and the projects we're working on. If you have any questions or need further information, please don't hesitate to reach out to us at <a href="mailto:admin@cencadian.ca">admin@cencadian.ca</a></p>
                            <p class="text-muted">Once again, thank you for your interest in joining our team. We appreciate your application and look forward to the opportunity to get to know you better.</p>
                        </div>

                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    @else
        <div class="position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg profile-setting-img">
                <img src="{{ asset('assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-3">
                <div class="card mt-n5">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow" alt="user-profile-image">
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                <span class="avatar-title rounded-circle bg-light text-body shadow">
                                                    <i class="ri-camera-fill"></i>
                                                </span>
                                    </label>
                                </div>
                            </div>
                            <h5 class="fs-16 mb-1">{{ auth()->user()->name }}</h5>
                            <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>
                @if(!auth()->user()->isAdmin())
                    <!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-5">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-0">Complete Your Profile</h5>
                                </div>
                            </div>
                            @if(auth()->user()->application)
                                <div class="progress animated-progress custom-progress progress-label">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                        <div class="label">100%</div>
                                    </div>
                                </div>
                            @else
                                <div class="progress animated-progress custom-progress progress-label">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                        <div class="label">80%</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
            <!--end col-->
            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        @if(auth()->user()->application)
                            <div class="alert alert-success text-center">Application Submitted Successfully </div>
                        @endif
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                    <i class="fas fa-home"></i> Personal Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                    <i class="far fa-user"></i> Change Password
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                <form action="{{ route('application.store') }}" method="post" enctype="multipart/form-data">

                                    <h2 class="mb-4">Personal Details</h2>

                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="firstnameInput" class="form-label">Full Name</label>
                                                <input required name="name" type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="{{ auth()->user()->name }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Email Address</label>
                                                <input required name="email" type="email" class="form-control" id="emailInput" placeholder="Enter your email" value="{{ auth()->user()->email }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="dob" class="form-label">Date of Birth (DOB)</label>
                                                <input required name="dob" type="date" class="form-control" id="dob" placeholder="Enter DOB" value="{{ auth()->user()->dob }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Gender</label>
                                                <input type="text" value="{{ auth()->user()->gender }}" readonly class="form-control">
                                            </div>
                                        </div>

                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                <input required name="phone" type="text" class="form-control" id="phonenumberInput" placeholder="Enter your phone number" value="{{ auth()->user()->phone ?? '' }}">
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="designationInput" class="form-label">Current School/University </label>
                                                <input value="{{ auth()->user()->application->school ?? '' }}" required name="school" type="text" class="form-control" id="designationInput" placeholder="University / College / HighSchool">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="websiteInput1" class="form-label">Skills (Seperate with Coma (,))</label>
                                                <input value="{{ auth()->user()->application->skills ?? '' }}" required name="skills" type="text" class="form-control" id="websiteInput1" placeholder="MongoDB, Express, React, NodeJs..." />
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-6">
                                            <div class="mb-5">
                                                <label for="cityInput" class="form-label">Address</label>
                                                <input readonly value="{{ auth()->user()->address }}" required name="city" type="text" class="form-control" id="cityInput" placeholder="Enter Your City" />
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <h2>References</h2>
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <p>Please provide contact information for 3 references who are familiar with you and your capabilities.</p>
                                        </div>

                                        <div class="col-lg-12">
                                            <h5>Reference 1</h5>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref1NameInput" class="form-label">Name</label>
                                                <input required name="reference1_name" type="text" class="form-control" id="ref1NameInput" placeholder="Enter Reference 1's name" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref1OrgInput" class="form-label">Organization</label>
                                                <input required name="reference1_org" type="text" class="form-control" id="ref1OrgInput" placeholder="Enter Reference 1's organization" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref1RelationshipInput" class="form-label">Relationship</label>
                                                <input required name="reference1_relationship" type="phone" class="form-control" id="ref1RelationshipInput" placeholder="Enter Reference 1's relationship" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref1PhoneInput" class="form-label">Phone</label>
                                                <input required name="reference1_phone" type="phone" class="form-control" id="ref1PhoneInput" placeholder="Enter Reference 1's phone" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref1EmailInput" class="form-label">Email</label>
                                                <input required name="reference1_email" type="email" class="form-control" id="ref1EmailInput" placeholder="Enter Reference 1's email" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-5">
                                                <p>Preferred Contact Method</p>

                                                <label for="ref1PrefPhoneInput" class="form-label">Phone</label>
                                                <input type="radio" id="ref1PrefPhoneInput" name="reference1_prefContact" value="phone"/>

                                                <label for="ref1PrefEmailInput" class="form-label">Email</label>
                                                <input type="radio" id="ref1PrefEmailInput" name="reference1_prefContact" value="email"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <h5>Reference 2</h5>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref2NameInput" class="form-label">Name</label>
                                                <input required name="reference2_name" type="text" class="form-control" id="ref2NameInput" placeholder="Enter Reference 2's name" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref2OrgInput" class="form-label">Organization</label>
                                                <input required name="reference2_org" type="text" class="form-control" id="ref2OrgInput" placeholder="Enter Reference 2's organization" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref1RelationshipInput" class="form-label">Relationship</label>
                                                <input required name="reference2_relationship" type="phone" class="form-control" id="ref2RelationshipInput" placeholder="Enter Reference 2's relationship" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref2PhoneInput" class="form-label">Phone</label>
                                                <input required name="reference2_phone" type="phone" class="form-control" id="ref2PhoneInput" placeholder="Enter Reference 2's phone" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref2EmailInput" class="form-label">Email</label>
                                                <input required name="reference2_email" type="email" class="form-control" id="ref2EmailInput" placeholder="Enter Reference 2's email" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-5">
                                                <p>Preferred Contact Method</p>


                                                <label for="ref2PrefPhoneInput" class="form-label">Phone</label>
                                                <input type="radio" id="ref2PrefPhoneInput" name="reference2_prefContact" value="phone"/>

                                                <label for="ref1PrefEmailInput" class="form-label">Email</label>
                                                <input type="radio" id="ref2PrefEmailInput" name="reference2_prefContact" value="email"/>


                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <h5>Reference 3</h5>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref3NameInput" class="form-label">Name</label>
                                                <input required name="reference3_name" type="text" class="form-control" id="ref3NameInput" placeholder="Enter Reference 3's name" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref3OrgInput" class="form-label">Organization</label>
                                                <input required name="reference3_org" type="text" class="form-control" id="ref3OrgInput" placeholder="Enter Reference 3's organization" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref3RelationshipInput" class="form-label">Relationship</label>
                                                <input required name="reference3_relationship" type="phone" class="form-control" id="ref3RelationshipInput" placeholder="Enter Reference 3's relationship" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref3PhoneInput" class="form-label">Phone</label>
                                                <input required name="reference3_phone" type="phone" class="form-control" id="ref3PhoneInput" placeholder="Enter Reference 3's phone" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="ref3EmailInput" class="form-label">Email</label>
                                                <input required name="reference3_email" type="email" class="form-control" id="ref3EmailInput" placeholder="Enter Reference 3's email" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-5">
                                                <p>Preferred Contact Method</p>

                                                <label for="ref1PrefPhoneInput" class="form-label">Phone</label>
                                                <input type="radio" id="ref1PrefPhoneInput" name="reference3_prefContact" value="phone"/>

                                                <label for="ref1PrefEmailInput" class="form-label">Email</label>
                                                <input type="radio" id="ref1PrefEmailInput" name="reference3_prefContact" value="email"/>
                                            </div>
                                        </div>

                                        <h2>R&#x00e9sum&#x00e9</h2>

                                        <div class="card-body">
                                            <div>
                                                @if(auth()->user()->application)
                                                    <a href="{{ auth()->user()->application->resume }}" class="btn btn-ghost-light w-100 text-black">
                                                        View Submitted Resume
                                                    </a>
                                                @else
                                                    <p class="text-muted">Upload Your Reśume here. (Only PDF allowed)</p>
                                                    <div class="fallback">
                                                        <input class="form-control" required name="resume" type="file" />
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3 pb-2">
                                                <label for="exampleFormControlTextarea" class="form-label">Additional Note (<small>Optional</small>)</label>
                                                <textarea name="note" class="form-control" id="exampleFormControlTextarea" placeholder="Enter any additional note" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        @if(auth()->user()->application)
                                            <div class="alert alert-success text-center">Application Submitted Successfully </div>
                                        @else
                                            @if (!auth()->user()->isAdmin())
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="submit" class="btn btn-primary">Submit Application</button>
                                                        <button type="button" class="btn btn-soft-success">Cancel</button>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane" id="changePassword" role="tabpanel">
                                <form action="javascript:void(0);">
                                    <div class="row g-2">
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="oldpasswordInput" class="form-label">Old Password*</label>
                                                <input type="password" class="form-control" id="oldpasswordInput" placeholder="Enter current password">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="newpasswordInput" class="form-label">New Password*</label>
                                                <input type="password" class="form-control" id="newpasswordInput" placeholder="Enter new password">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="confirmpasswordInput" class="form-label">Confirm Password*</label>
                                                <input type="password" class="form-control" id="confirmpasswordInput" placeholder="Confirm password">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success">Change Password</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <!--end tab-pane-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    @endif
@endsection
