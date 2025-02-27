<!--datatable css-->
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css') }}" />
<!--datatable responsive css-->
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css') }}" />

<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css') }}">


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Project List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                    <li class="breadcrumb-item active">Project List</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row g-4 mb-3">
    <div class="col-sm-auto">
        <div>
            <a href="{{ route('company.create') }}" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i>Propose a Project</a>
        </div>
    </div>
</div>

@php $count = 0;  @endphp
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Proposed Projects</h5>
            </div>

            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 10px;">
                            <div class="form-check">
                                <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                            </div>
                        </th>
                        <th data-ordering="false">SR No.</th>
                        <th data-ordering="false">Title</th>
                        <th>Service Category</th>
                        <th>Budget</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->serviceRequest as $sr)
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                </div>
                            </th>
                            <td>{{ ++$count }}</td>
                            <td>{{ ucfirst($sr->title) }}</td>
                            <td>{{ $sr-> service_category }}</td>
                            <td>{{ $sr->budget }}</td>
                            <td>{{ ucfirst($sr->created_at) }}</td>
                            <!-- <td><a target="_blank" href="https://arabicawhite.s3.amazonaws.com/file/{{ $sr->file }}">{{ ucfirst('Uploaded Document') }}</a></td> -->
                            <td><span class="badge @if($sr->priority === 'High') bg-danger @elseif($sr->priority === 'Medium') bg-warning @else bg-primary @endif">{{ $sr->status }}</span></td>

                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li><a class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@if ($count == 0)
<div class="row justify-center">
    <p class="fs-4 text-info fw-bold text-center">
        You haven't proposed any projects! Press "Propose a project" to get started.
    </p>
</div>
@endif

<h3>Project Proposal and Development Process</h3>

<ol>
    <li>Click "Propose a Project"</li>
    <li>Complete and submit the displayed Project Proposal Form</li>
    <li>Your application will be reviewed by Cencadian's team</li>
    <li>Cencadian will contact you for details about the project's requirements and any associated cost</li>
    <li>Cencadian will contact you regarding the approval of your application</li>
    <li>Your project will be ranked based on our organizational priorities</li>
    <li>Once your project commences, it will go through three major stages</li>
    <ol type="i">
        <li>Project Planning</li>
        <li>Mid-Project Review</li>
        <li>Project completion Review</li>
    </ol>
</ol>

<p>Once your project is completed, you will gain full ownership of the system!</p>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
