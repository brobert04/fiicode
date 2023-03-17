@extends('doctor.template')
@section('title', 'Medicool | Doctor Dashboard')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <h2>Hello</h2>
@endsection
@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
