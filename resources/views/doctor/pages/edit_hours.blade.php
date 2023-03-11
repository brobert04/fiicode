@extends('doctor.template')
@section('title', 'Medicool | Edit working hours')
@section('content')
<div class="card card-dark">
    <div class="card-header">
      <h3 class="card-title">Edit Working Hours for - <span class="text-primary" style="text-transform: capitalize">{{ $hours->day }}</span></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('doctor.profile.business-hours.update', $hours->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="day">Day</label>
          <input type="text" class="form-control" value='{{ $hours->day }}' disabled style="text-transform: capitalize">
          <input type="text" class="form-control" id="day" name="day" value='{{ $hours->day }}' hidden>
          @error('day') <span class="text-danger small">{{$message}}</span>@enderror
        </div>
        <div class="form-group">
          <label for="start_hour">Opening Hours</label>
          <input type="time" class="form-control" id="start_hour" name="start_hour" value='{{ !empty($hours->start_hour) ? \Carbon\Carbon::parse($hours->start_hour)->format('H:i') : '' }}'>
        </div>
        <div class="form-group">
            <label for="end_hour">Closing Hours</label>
            <input type="time" class="form-control" id="end_hour" name="end_hour" value='{{ !empty($hours->end_hour) ? \Carbon\Carbon::parse($hours->end_hour)->format('H:i') : '' }}'>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-dark">Submit</button>
      </div>
    </form>
  </div>        
@endsection



