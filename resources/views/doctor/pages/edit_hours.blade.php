@extends('doctor.template')
@section('title', 'Medicool | Edit working hours')
@section('content')
<div class="card card-dark">
    <div class="card-header">
      <h3 class="card-title">Edit Working Hours for - <span class="text-primary" style="text-transform: capitalize">{{ $hours->day }}</span></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="day">Email address</label>
          <input type="text" class="form-control" value='{{ $hours->day }}' disabled>
          <input type="text" class="form-control" id="exampleInputEmail1" id="day" name="day" hidden>
        </div>
        <div class="form-group">
          <label for="start_hour">Opening Hours</label>
          <input type="time" class="form-control" id="start_hour" value='{{ !empty($hours->start_hour) ? \Carbon\Carbon::parse($hours->start_hour)->format('H:i') : '' }}'>
        </div>
        <div class="form-group">
            <label for="end_hour">Closing Hours</label>
            <input type="time" class="form-control" id="end_hour" value='{{ !empty($hours->end_hour) ? \Carbon\Carbon::parse($hours->end_hour)->format('H:i') : '' }}'>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-dark">Submit</button>
      </div>
    </form>
  </div>        
@endsection



