@extends('patient.template')
@section('title', 'HealthHub | Make Appointment')
@section('custom-css')
@endsection
@section('content')
<div class="card card-dark">
    <div class="card-header">
      <h3 class="card-title">Request Appointment</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('patient.make-appointment.save') }}" method="post">
    @csrf
      <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">On what name</label>
                    <input type="text" class="form-control" placeholder="Enter name" value="{{auth()->user()->name}}" disabled>
                    <input type="hidden" value="{{auth()->user()->name}}" id="name" name="name">
                  </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" placeholder="Enter email" value="{{auth()->user()->email}}" disabled>
                    <input type="hidden" value="{{auth()->user()->email}}" id="email" name="email">
                  </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" placeholder="Enter phone number" value="{{auth()->user()->patient->phone}}" disabled>
                    <input type="hidden" value="{{auth()->user()->patient->phone}}" id="phone" name="phone">
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Enter date">
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" name="time" placeholder="Enter time">
                  </div>
            </div>
        </div>
        <div class="form-group">
          <label for="reason">Reason</label>
         <textarea id="reason" name="reason" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="doctor">Doctor</label>
            <select class="form-control" id="doctor" name="doctor">
                <option value="{{ auth()->user()->patient->doctor->id}}" selected>
                    {{ auth()->user()->patient->doctor->user->name }}</option>
            </select>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-dark">Submit</button>
      </div>
    </form>
  </div>
@endsection
@section('custom-js')
<script>
    @if(session()->has('success'))
        $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Patient management',
                    autohide: true,
                    delay: 2500,
                    body: '{{ session()->get('success') }}'
        })
    @endif
        @if(session()->has('error'))
        $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Patient management',
                    autohide: true,
                    delay: 2500,
                    body: '{{ session()->get('error') }}'
        })
        @endif
</script>
@endsection
