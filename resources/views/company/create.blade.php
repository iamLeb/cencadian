@extends('layouts.backend')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Create Service Request</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Service Request</a></li>
                        <li class="breadcrumb-item active">Create SR</li>
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
                        <input name="title" type="text" class="form-control" id="project-title-input" placeholder="Enter project title">
                    </div>

{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label" for="project-thumbnail-img">Thumbnail Image</label>--}}
{{--                        <input name="" class="form-control" id="project-thumbnail-img" type="file" accept="image/png, image/gif, image/jpeg">--}}
{{--                    </div>--}}

                    <div class="mb-3">
                        <label class="form-label">Project Description</label>
                        <textarea class="form-control" name="desc" id="" cols="30" rows="10" placeholder="Enter Project Description"></textarea>
                    </div>

                    <div class="row">
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
                    </div>
        </div>
            </div>
            <!-- end card -->

            <div class="card">
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
                                <!-- This is used as the file preview template -->
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
                        <!-- end dropzon-preview -->
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="text-end mb-4">
                <a href="{{ route('company.store') }}" onclick="event.preventDefault(); document.getElementById('create-request').submit();" class="btn btn-success w-sm">Create Service Request</a>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-4">
            <div class="card">
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
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tags</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="choices-categories-input" class="form-label">Categories</label>
                        <select name="category" class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                            <option  selected>-- Select Category --</option>
                            <option value="new">New Service</option>
                            <option value="alter">Alter Existing Service</option>
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
