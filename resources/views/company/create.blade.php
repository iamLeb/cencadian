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
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="project-title-input" placeholder="Enter project title" required>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label" for="project-thumbnail-img">Thumbnail Image</label>--}}
{{--                        <input name="" class="form-control" id="project-thumbnail-img" type="file" accept="image/png, image/gif, image/jpeg">--}}
{{--                    </div>--}}

                    <div class="mb-3">
                        <label class="form-label">Executive Summary</label>
                        <p>What type of business do you offer, and how could a website help you?</p>
                        <textarea class="form-control @error('executive_summary') is-invalid @enderror" name="executive_summary" id="" cols="30" rows="10" placeholder="Enter Executive Summary" required>{{ old('executive_summary') }}</textarea>
                        @error('executive_summary')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Project Requirements</label>
                        <p>What are the features or functionalities you want to see in your website?</p>
                        <textarea class="form-control @error('project_requirements') is-invalid @enderror" name="project_requirements" id="" cols="30" rows="10" placeholder="Enter Project Requirements" required>{{ old('project_requirements') }}</textarea>
                        @error('project_requirements')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Budget</label>
                        {{-- <p>Cencadian is a community-minded non-profit organization offering free and low-cost web development services to small to medium-sized businesses and organizations. A budget is not required, but can help us offer additional support, features, and quality for your project. Indicate your proposed budget range, and we will offer a tailored package specific to your organization’s needs. Please note that your organization will be responsible for domain hosting and any other costs associated with maintaining the project.</p> --}}
                        <p>What amount of funds is your organization allocating for this project?</p>

                        <div class="mb-3">
                                <select class="form-control @error('budget') is-invalid @enderror" name="budget">
                                    <option 
                                        @if (!old('budget'))
                                            selected
                                        @endif
                                        disabled
                                    >
                                        -- Select Budget --
                                    </option>

                                    <option 
                                        value="<$2000"
                                        @if (old('budget') === "<$2000")
                                            selected
                                        @endif
                                    >
                                        Budget less than $2000 (Basic Website without Maintainance)
                                    </option>
        
                                    <option 
                                        value="$2000-$4000"
                                        @if (old('budget') === "$2000-$4000")
                                            selected
                                        @endif
                                    >
                                        Budget between $2000 - $4000 (Advanced Feature Website with 1 year Maintainance)
                                    </option>
    
                                    <option 
                                        value="$4000-$6000"
                                        @if (old('budget') === "$4000-$6000")
                                            selected
                                        @endif
                                    >
                                        Budget between $4000 - $6000 (Premium Feature Website with 1 year Maintainance, Domain and Hosting)
                                    </option>
                                </select>
                                @error('budget')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                @enderror
                        </div>

                        <div class="mb-3">

                            <span>Please specify:</span>
                            <input name="budget_specify" id="budgetSpec" value={{old('budget_specify') ?? "$"}}  type="text" class="form-control @error('budget_specify') is-invalid @enderror">
                            @error('budget_specify')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <script>
                        //prevent non-number characters from being input in the budget and prevent them from deleting $
                        const input = document.querySelector('#budgetSpec');
                        input.addEventListener('input', () => {
                            let val = input.value;

                            if (val.length == 0) {
                                input.value = "$";
                            } else if ((val.length > 1) && isNaN(parseInt(val.substring(val.length -1)))) { 
                                input.value = val.substring(0, val.length -1);
                            }

                            
                        });
                    </script>

                    <div class="mb-3">
                        <label class="form-label">Other Remarks (Optional)</label>
                        <p>Is there any other thing we should know about the project?</p>
                        <textarea class="form-control" name="other_remarks" id="" cols="30" rows="10" placeholder="Enter Other Remarks">{{old('other_remarks')}}</textarea>
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
                        <select name="service_category" class="form-select @error('service_category') is-invalid @enderror" data-choices data-choices-search-false id="choices-categories-input" required>
                            <option disabled
                            @if (!old('service_category'))
                                    selected
                                @endif
                            >
                                -- Select Service Category --
                            </option>

                            <option 
                                value="new"
                                @if (old('service_category') == 'new')
                                    selected
                                @endif
                            >
                                New Service
                            </option>

                            <option 
                                value="alter"
                                @if (old('service_category') == 'alter')
                                    selected
                                @endif
                            >
                                Alter Existing Service
                            </option>
                        </select>
                        @error('service_category')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                {{-- </div> --}}

                {{-- <div class="card">
                <div class="card-body"> --}}
                    <div class="mb-3">
                        <label for="choices-categories-input" class="form-label">Organization Type</label>
                        <select name="org_category" class="form-select @error('org_category') is-invalid @enderror" data-choices data-choices-search-false id="choices-categories-input" required>

                            <option disabled 
                                @if (!old('org_category'))
                                    selected
                                @endif
                            >
                                -- Select Organization Type --
                            </option>

                            <option 
                                value="smallbiz"
                                @if (old('org_category')  == 'smallbiz')
                                    selected
                                @endif
                            >
                                Small Business
                            </option>

                            <option
                                value="medbiz"
                                @if (old('org_category')  == 'medbiz')
                                    selected
                                @endif
                            >
                                Medium Business
                            </option>


                            <option 
                                value="nonprofit"
                                @if (old('org_category') == 'nonprofit')
                                    selected
                                @endif
                            >
                                Non-Profit Organization
                            </option>

                            <option 
                                value="other"
                                @if (old('org_category') == 'other')
                                    selected
                                @endif
                            >
                                Other Organization Type
                            </option>

                        </select>
                        @error('org_category')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <!-- end card body -->
            {{-- </div> --}}
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="text-end mb-4 w-100">
        <a href="{{ route('company.store') }}" onclick="event.preventDefault(); document.getElementById('create-request').submit();" class="btn btn-success w-100 btn-lg">Submit Project Proposal</a>
    </div>
    </form>

    <!-- ckeditor -->
    <script src="{{ asset('assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <!-- project-create init -->
    <script src="{{ asset('assets/js/pages/project-create.init.js') }}"></script>
@endsection
