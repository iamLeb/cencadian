@extends('layouts.backend')
@section('content')

@if ($referenceCheck)
    <h1>Reference Submitted</h1>

    <p>Thank you for taking the time to fill out the reference questionnaire.
        If you have any questions, feel free to contact us at <a href="mailto:admin@cencadian.ca">admin@cencadian.ca</a>.
    </p>
@else
    @include('components.referenceQuestionnaireForm')
@endif

@endsection