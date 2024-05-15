@extends('layouts.backend')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Propose a Project</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/company">Projects</a></li>
                        <li class="breadcrumb-item active">Propose a Project</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <form id="create-request" action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="project-title-input">Project Title</label>
                        <input name="title" type="text" class="form-control" id="project-title-input" placeholder="Enter project title" required>
                    </div>

{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label" for="project-thumbnail-img">Thumbnail Image</label>--}}
{{--                        <input name="" class="form-control" id="project-thumbnail-img" type="file" accept="image/png, image/gif, image/jpeg">--}}
{{--                    </div>--}}

                    <div class="mb-3">
                        <label class="form-label">Executive Summary</label>
                        <p>Provide a brief overview of your organization, the project, the needs it addresses, and the proposed solution. Summarize the main objectives and the expected outcomes of the project</p>
                        <textarea class="form-control" name="executive_summary" id="" cols="30" rows="10" placeholder="Enter Executive Summary" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Community Involvement</label>
                        <p>As a community-minded organization, Cencadian prioritizes working with organizations that make an impact in their community. Explain how your business or organization impacts the local community. </p>
                        <textarea class="form-control" name="community_involvement" id="" cols="30" rows="10" placeholder="Enter Community Involvement" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Background and Rationale</label>
                        <p>Describe the problem and why the project is necessary. Explain how the project aligns with the strategic goals of your organization, and how it will help form connections in your community.</p>
                        <textarea class="form-control" name="background_rationale" id="" cols="30" rows="10" placeholder="Enter Background & Rationale" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Project Requirements</label>
                        <p>Detail the specific features and functionalities you would like to see implemented in your project.</p>
                        <textarea class="form-control" name="project_requirements" id="" cols="30" rows="10" placeholder="Enter Project Requirements" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Project Team</label>
                        <p>List the members of your organization that will be involved in the project, including their roles and responsibilities.</p>
                        <textarea class="form-control" name="project_team" id="" cols="30" rows="10" placeholder="Enter Project Team" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Budget</label>
                        <p>Cencadian is a community-minded non-profit organization offering free and low-cost web development services to small to medium-sized businesses and organizations. A budget is not required, but can help us offer additional support, features, and quality for your project. Indicate your proposed budget range, and we will offer a tailored package specific to your organization’s needs. Please note that your organization will be responsible for domain hosting and any other costs associated with maintaining the project.</p>
                        <textarea class="form-control" name="budget" id="" cols="30" rows="10" placeholder="Enter Budget" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Other Remarks</label>
                        <p>If there is anything Cencadian should know about your organization or your proposed project not covered in the previous sections, let us know here.</p>
                        <textarea class="form-control" name="other_remarks" id="" cols="30" rows="10" placeholder="Enter Other Remarks"></textarea>
                    </div>


                    <!-- <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3 mb-lg-0">
                                <label for="choices-priority-input" class="form-label">Priority</label>
                                <select name="priority" class="form-select" data-choices data-choices-search-false id="choices-priority-input">
                                    <option value="High" selected>High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label for="datepicker-deadline-input" class="form-label">Deadline</label>
                                <input name="deadline" type="date" class="form-control" id="datepicker-deadline-input">
                            </div>
                        </div>
                    </div> -->
        </div>
            </div>
            <!-- end card -->

            <!-- <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Attached files</h5>
                </div>
                <div class="card-body">
                    <div>
                        <p class="text-muted">Upload PDF with service details (Only PDF is allowed)</p>

                        <div class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple="multiple">
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                </div>

                                <h5>Drop files here or click to upload.</h5>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                            <li class="mt-2" id="dropzone-preview-list">
                                This is used as the file preview template
                                <div class="border rounded">
                                    <div class="d-flex p-2">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm bg-light rounded">
                                                <img src="#" alt="Project-Image" data-dz-thumbnail class="img-fluid rounded d-block" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="pt-1">
                                                <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ms-3">
                                            <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        end dropzon-preview
                    </div>
                </div>
            </div> -->
            <!-- end card -->

            <div class="text-end mb-4">
                <a href="{{ route('company.store') }}" onclick="event.preventDefault(); document.getElementById('create-request').submit();" class="btn btn-success w-sm">Submit Project Proposal</a>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-4">
            <!-- <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Privacy</h5>
                </div>
                <div class="card-body">
                    <div>
                        <label for="choices-privacy-status-input" class="form-label">Budget</label>
                        <select name="budget" class="form-select" data-choices data-choices-search-false id="choices-privacy-status-input">
                            <option  selected>-- Select Budget --</option>
                            <option value="2000-3000">$2,000 - $3,000</option>
                            <option value="3000-4000">$3,000 - $4,000</option>
                            <option value="4000-5000">$4,000 - $5,000</option>
                            <option value="5000-6000">$5,000 - $6,000</option>
                        </select>
                    </div>
                </div>
                end card body
            </div> -->
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Project Context</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="choices-categories-input" class="form-label">Service Category</label>
                        <select name="service_category" class="form-select" data-choices data-choices-search-false id="choices-categories-input" required>
                            <option  selected>-- Select Service Category --</option>
                            <option value="new">New Service</option>
                            <option value="alter">Alter Existing Service</option>
                        </select>
                    </div>

                </div>

                <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="choices-categories-input" class="form-label">Organization Type</label>
                        <select name="org_category" class="form-select" data-choices data-choices-search-false id="choices-categories-input" required>
                            <option  selected>-- Select Organization Type --</option>
                            <option value="smallbiz">Small Business</option>
                            <option value="medbiz">Medium Business</option>
                            <option value="nonprofit">Non-Profit Organization</option>
                            <option value="other">Other Organization Type</option>
                        </select>
                    </div>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    </form>

    <!-- ckeditor -->
    <script src="{{ asset('assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <!-- project-create init -->
    <script src="{{ asset('assets/js/pages/project-create.init.js') }}"></script>
@endsection
