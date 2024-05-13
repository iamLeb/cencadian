<div class="row">
    <div class="col-lg-12">
        <div class="card mt-n4 mx-n4">
            <div class="bg-primary-subtle">
                <div class="card-body px-4 pb-4">
                    <div class="row mb-3">
                        <div class="col-md">
                            <div class="row align-items-center g-3">
                                <div class="col-md-auto">
                                    <div class="avatar-md">
                                        <div class="avatar-title bg-white rounded-circle">
                                            <img src="assets/images/brands/slack.png" alt="" class="avatar-xs">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div>
                                        <h4 class="fw-bold">Software Developer</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div><i class="ri-building-line align-bottom me-1"></i> iamLeb</div>
                                            <div class="vr"></div>
                                            <div><i class="ri-map-pin-2-line align-bottom me-1"></i> Winnipeg, Manitoba</div>
                                            <div class="vr"></div>
                                            <div>Post Date : <span class="fw-medium">1 June, 2024</span></div>
                                            <div class="vr"></div>
                                            <div class="badge rounded-pill bg-success fs-12">Full Time / Part Time</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="hstack gap-1 flex-wrap mt-4 mt-md-0">
                                <button type="button" class="btn btn-icon btn-sm shadow-none btn-ghost-warning fs-16">
                                    <i class="ri-star-fill"></i>
                                </button>
                                <button type="button" class="btn btn-icon btn-sm shadow-none btn-ghost-primary fs-16">
                                    <i class="ri-share-line"></i>
                                </button>
                                <button type="button" class="btn btn-icon btn-sm shadow-none btn-ghost-primary fs-16">
                                    <i class="ri-flag-line"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
        </div>
        <!-- end card -->
    </div>
    <!--end col-->
</div>
<!--end row-->

<div class="row mt-n5">
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Job Description</h5>

                <p class="text-muted mb-2">We are seeking a motivated Software Development Intern to join our team. As an intern, you will have the opportunity to work closely with our experienced developers on various projects, gaining valuable insights and practical experience in software development.</p>
                <div>
                    <h5 class="mb-3">Responsibilities of Product Designer</h5>
                    <p class="text-muted">Provided below are the responsibilities of a Product Designer:</p>
                    <ul class="text-muted vstack gap-2">

                        <li>Collaborate with the development team to design, develop, test, and deploy software solutions.</li>
                        <li>Assist in coding, debugging, and troubleshooting software issues.</li>
                        <li>Participate in code reviews and provide constructive feedback to peers.</li>
                        <li>Research and explore new technologies and methodologies to enhance our development process.</li>
                        <li>Contribute to brainstorming sessions and offer creative ideas for project improvement and innovation.</li>
                        <li>Communicate effectively with team members to ensure project goals and deadlines are met.</li>
                    </ul>
                </div>

                <div>
                    <h5 class="mb-3">Skill & Experience</h5>
                    <ul class="text-muted vstack gap-2">
                        <li>
                            Communication skills
                        <li>
                            Sound visualisation abilities
                        </li>
                        <li>
                            Observation skills
                        </li>
                        <li>
                            Problem-solving abilities
                        </li>
                        <li>
                            Eye for aesthetic design and understanding of customer appeal
                        </li>
                        <li>
                            Artistic & innovative flair
                        </li>
                        <li>
                            Strong knowledge of the industry & market trends
                        </li>
                        <li>
                            Relevant work experience in a particular field is mandatory
                        </li>
                    </ul>
                </div>

                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <h5 class="mb-0">Share this job:</h5>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!" class="btn btn-icon btn-soft-info"><i class="ri-facebook-line"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!" class="btn btn-icon btn-soft-success"><i class="ri-whatsapp-line"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!" class="btn btn-icon btn-soft-secondary"><i class="ri-twitter-line"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!" class="btn btn-icon btn-soft-danger"><i class="ri-mail-line"></i></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="col-xxl-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Job Overview</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table mb-0">
                        <tbody>
                        <tr>
                            <td class="fw-medium">Title</td>
                            <td>Web Development</td>
                        </tr>
                        <tr>
                            <td class="fw-medium">Company Name</td>
                            <td>iamLeb</td>
                        </tr>
                        <tr>
                            <td class="fw-medium">Location</td>
                            <td>Winnipeg, Manitoba, Canada</td>
                        </tr>
                        <tr>
                            <td class="fw-medium">Time</td>
                            <td><span class="badge bg-success-subtle text-success">Full Time / Part Time</span></td>
                        </tr>
                        <tr>
                            <td class="fw-medium">No. of Applicants</td>
                            <td>{{ \App\Models\Application::count() }} Application</td>
                        </tr>
                        <tr>
                            <td class="fw-medium">Post Date</td>
                            <td>1 June, 2024</td>
                        </tr>
                        </tbody>
                    </table>
                    <!--end table-->
                </div>
                <div class="mt-4 pt-2 hstack gap-2">
                    @if (auth()->user()->application)
                        <div class="alert alert-success w-100 text-center">Application Sent</div>
                    @else
                        <a href="{{ route('profile') }}" class="btn btn-primary w-100">Apply Now</a>
                        <a href="#!" class="btn btn-soft-danger btn-icon custom-toggle flex-shrink-0" data-bs-toggle="button">
                            <span class="icon-on"><i class="ri-bookmark-line align-bottom"></i></span>
                            <span class="icon-off"><i class="ri-bookmark-3-fill align-bottom"></i></span>
                        </a>
                    @endif

                </div>
            </div>
        </div>
        <!--end card-->
    </div>
</div>
