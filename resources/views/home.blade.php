@extends('layouts.backend')
@section('title') Main Page @endsection
@section('content')
    @if(auth()->user()->isIntern())
        @include('components/intern')
    @elseif(auth()->user()->isHired())
        @include('components/hired')
    @elseif(auth()->user()->isCompany())
        @include('components/company')
    @else
        @include('components/adminDashboard')
    @endif
@endsection
