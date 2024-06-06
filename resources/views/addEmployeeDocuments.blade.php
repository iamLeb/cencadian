@extends('layouts.backend')
@section('title') My Documents @endsection
@section('content')
    <h3>Add Employee Documents</h3>

    <div class="card">
        <form action="{{route('create.document')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        {{-- <div class="col"> --}}
                            <h5 class="card-title">Add to Employee(s)</h5>

                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>

                                    <th scope="col" style="width: 10px;">
                                        <div class="form-check">
                                            <input id="check-all" class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                        </div>
                                    </th>
                                    <th>
                                        Employee Name
                                    </th>

                                    <th>
                                        Type
                                    </th>

                                    <th>
                                        Actions
                                    </th>
                                </thead>

                                <tbody>
                                    @foreach ($employees as &$employee)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input fs-15" type="checkbox" name="share_with[]" value="{{$employee->id}}">
                                                </div>
                                            </th>

                                            <td>{{$employee->name}}</td>

                                            <td>{{$employee->type}}</td>

                                            <td><a href="{{route('admin.intern.show', ['id' => $employee->id])}}">View Profile</a></td>
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label for="documentCategoryInput">Document Category</label>
                                    <input type="text" class="form-control" id="documentCategoryInput" name="category"/>
                                </div>
                            </div>
                                
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label for="documentNameInput">Document Name</label>
                                    <input type="text" class="form-control" id="documentNameInput" name="document_name"/>
                                </div>
                            </div>

                            <h5>Upload Document</h5>

                            <div class="fallback mb-4">
                                <input class="form-control" required name="document" type="file" />
                            </div>

                            <button type="submit" class="btn btn-lg btn-primary">Add Document</button>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        let checkAllBox = document.querySelector('#check-all');
        checkAllBox.addEventListener('click', (e) => {
            let formChecks = document.querySelectorAll('input.form-check-input');

            for (let i = 0; i<formChecks.length; i++) {
                formChecks[i].checked=e.target.checked;
            }
        });
    </script>
@endsection