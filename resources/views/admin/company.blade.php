@extends('layouts.backend')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">companies</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Lists</a></li>
                            <li class="breadcrumb-item active">companies</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">List of companies</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control search" placeholder="Search...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th class="sort" data-sort="customer_name">Customer</th>
                                        <th class="sort" data-sort="email">Email</th>
                                        <th class="sort" data-sort="phone">Phone</th>
                                        <th class="sort" data-sort="date">Joining Date</th>
                                        <th class="sort" data-sort="status">Status</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                    @php
                                        $companies = \App\Models\User::where('type', 'company')->get();
                                    @endphp
                                    @foreach($companies as $company)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                </div>
                                            </th>
                                            <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                            <td class="customer_name">{{ $company->name }}</td>
                                            <td class="email">{{ $company->email }}</td>
                                            <td class="phone">
                                                @php
                                                    $phone = str_replace(" ", "", $company->phone);
                                                    if(strlen($phone) > 10) {
                                                        $formatted_phone = substr($phone, 0) . ' ' . substr($phone, 1, 3) . ' ' . substr($phone, 3, 3) . ' ' . substr($phone, 6, 4);
                                                    } else {
                                                        $formatted_phone = substr($phone, 0, 3) . ' ' . substr($phone, 3, 3) . ' ' . substr($phone, 6, 4);
                                                    }
                                                    echo $formatted_phone;
                                                @endphp

                                            </td>
                                            <td class="date">{{ $company->created_at->toFormattedDateString() }}</td>
                                            <td class="status"><span class="badge bg-success-subtle text-success text-uppercase">Active</span></td>
                                            @if(count($company->serviceRequest))
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="remove">
                                                            <a href="{{ route('admin.company.show', $company->serviceRequest->first()->id ) }}" class="btn btn-sm btn-danger remove-item-btn" >View</a>
                                                        </div>
                                                    </div>
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
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than {{ \App\Models\User::where('type', 'company')->count() }}+ Companies We did not find any
                                            company for your search.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="javascript:void(0);">
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
    <!--end back-to-top-->
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ asset('assets/js/pages/listjs.init.js') }}"></script>

@endsection
