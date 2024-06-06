@extends('layouts.backend')
@section('title') My Documents @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="pt-3 pb-3">
                    <div class="mb-4">
                        <a href="{{route('home')}}">&#x2190; Back to dashboard</a>
                    </div>
                    <h3 class="mb-3">My Documents</h1>
                </div>

                
                <div class="card">
                    @if (auth()->user()->isAdmin())
                        <div class="card-body p-4">
                            <h3>Owned Documents</h3>

                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">File</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Added</th>
                                        <th scope="col">Actions</th>
                                    <tr>
                                </thead>

                                <tbody>
                                    @foreach ($ownedDocuments as &$ownedDocument)
                                        <tr>
                                            <td>
                                                <a target="_blank" href="https://arabicawhite.s3.amazonaws.com/documents/{{$ownedDocument->category}}/{{$ownedDocument->file_name}}">
                                                    {{$ownedDocument->file_name}}
                                                </a>
                                            </td>

                                            <td>
                                                {{$ownedDocument->category}}
                                            </td>

                                            <td>
                                                {{$ownedDocument->created_at}}
                                            </td>

                                            <td class="justify-content-end">
                                                <a class="btn btn-primary btn-sm" href="{{route('manage.document', ["id" => $ownedDocument->id])}}">Manage Access</a>
                                                <a class="btn btn-primary btn-sm" href="#">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if (!$ownedDocuments or !count($ownedDocuments))
                                        <tr>
                                            <td colspan="2">You haven't shared any documents!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <h3>Shared with me</h3>

                        <table class="table table-hover">

                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">File</th>
                                    <th scope="col">Category</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($accessibleDocuments as &$accessibleDocument)
                                    <tr>
                                        <td>
                                            <a target="_blank" href="https://arabicawhite.s3.amazonaws.com/documents/{{$accessibleDocument->category}}/{{$accessibleDocument->file_name}}">
                                                {{$accessibleDocument->file_name}}
                                            </a>
                                        </td>

                                        <td>
                                            {{$accessibleDocument->category}}
                                        </td>
                                    </tr>
                                @endforeach

                                @if (!$accessibleDocuments or !count($accessibleDocuments))
                                    <tr>
                                        <td colspan="2" class="text-center fw-bold">No documents have been shared with you.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
@endsection
