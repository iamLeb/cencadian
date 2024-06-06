@extends('layouts.backend')
@section('title') My Documents @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="pt-3 pb-3">
                    <div class="mb-4">
                        <a href="{{route('my.documents')}}">&#x2190; Back to my documents</a>
                    </div>
                    <h3 class="mb-3">Manage Document: {{$document->file_name}}</h1>
                </div>

                
                <div class="card p-3">
                    <form action="{{route('update.document', ['id' => $document->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Share With:</h3>

                        <table class="table table-hover" style="width:100%">
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
                                                <input class="form-check-input fs-15" 
                                                    type="checkbox" 
                                                    name="share_with[]" 
                                                    value="{{$employee->id}}"
                                                    @if (in_array($employee->id, $employeesWithAccess))
                                                        checked
                                                    @endif
                                                >
                                            </div>
                                        </th>

                                        <td>{{$employee->name}}</td>

                                        <td>{{$employee->type}}</td>

                                        <td><a href="{{route('admin.intern.show', ['id' => $employee->id])}}">View Profile</a></td>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>

                        <button class='btn btn-primary' type='submit'>Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
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
