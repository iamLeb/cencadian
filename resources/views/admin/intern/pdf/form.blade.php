@extends('layouts.backend')
@section('content')
    <form action="{{ route('admin.intern.pdf') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <button type="submit">Generate PDF</button>
    </form>
@endsection
