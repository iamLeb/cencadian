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

                            <ul>
                                @foreach ($ownedDocuments as &$ownedDocument)
                                    <li>
                                        <a target="_blank" href="https://arabicawhite.s3.amazonaws.com/documents/{{$ownedDocument->category}}/{{$ownedDocument->file_name}}">
                                            {{$ownedDocument->file_name}}
                                        </a>
                                    </li>
                                @endforeach

                                @if (!$ownedDocuments or !count($ownedDocuments))
                                    <li>You haven't shared any documents.</li>
                                @endif

                            </ul>
                        </div>
                    @endif
                    

                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <h3>Shared with me</h3>

                        <ul>
                            @foreach ($accessibleDocuments as &$accessibleDocument)
                                <li>
                                    <a target="_blank" href="https://arabicawhite.s3.amazonaws.com/documents/{{$accessibleDocument->category}}/{{$accessibleDocument->file_name}}">
                                        {{$accessibleDocument->file_name}}
                                    </a>
                                </li>
                            @endforeach

                            @if (!$accessibleDocuments or !count($accessibleDocuments))
                                <li>No documents have been shared with you</li>
                            @endif
                        </ul>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
@endsection
