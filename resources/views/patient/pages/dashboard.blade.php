@extends('patient.template')
@section('title', 'Medicool | Doctor Dashboard')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <h1 class="text-bold">Hello, {{ auth()->user()->name }}! 👀</h1>
@endsection
@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
