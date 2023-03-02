@extends('doctor.template')
@section('title', 'Health Page')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('../assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">
@endsection
@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Health File - {{ $patient->user-> name }} | Date: {{ now()->format('F j, Y') }}</h3>
  </div>
  <div class="card-body">
    <form>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="email" class="form-control" id="name" placeholder="Enter name" name="name" value={{ $patient->user->name }} disabled>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value={{ $patient->user->email }} disabled>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" disabled>
              <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
              <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="bod">Birthday</label>
            <input type="text" class="form-control" id="bod" placeholder="Enter date" value='{{ $patient->bod }}' disabled>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="date">Control Date</label>
            <div class="input-group date" id="date" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#date"/>
              <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
          </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="height">Height (cm's)</label>
           <input type="number" name="height" id="height" class="form-control" min="130">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="weight">Weight (kg's)</label>
           <input type="number" name="weight" id="weight" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="blood">Blood Group</label>
            <input type="text" name="blood" id="blood" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="reason">Reason for seeing this doctor + Symptoms</label>
        <textarea class="form-control" id="reason" placeholder="Enter here" name="reason"></textarea>
      </div>
      <h4 class="font-weight-bold">Medical History</h4>
      <div class="form-group">
        <label for="allergies">Allergies</label>
        <textarea class="form-control" id="allergies" placeholder="Enter here" name="allergies"></textarea>
      </div>
      <div class="form-group">
        <label>Have you ever had (Choose all that apply):</label>
        <select multiple class="form-control" id="conditions" name="conditions">
          <option>Anemia</option>
          <option>Asthma</option>
          <option>Arthritis</option>
          <option>Cancer</option>
          <option>Gout</option>
          <option>Diabetes</option>
          <option>Emotional Disorder</option>
          <option>Epilepsy Seizures</option>
          <option>Fainting Spells</option>
          <option>Gallstones</option>
          <option>Heart Disease</option>
          <option>Heart Attack</option>
          <option>Rheumatic Fever</option>
          <option>High Blood Pressure</option>
          <option>Digestive Problems</option>
          <option>Ulcerative Colitis</option>
          <option>Ulcer Disease</option>
          <option>Hepatitis</option>
          <option>Kidney Disease</option>
          <option>Liver Disease</option>
          <option>Sleep Apnea</option>
          <option>Diabetes</option>
          <option>Neurological Disorders</option>
        </select>
      </div> 
      <div class="form-group">
        <label for="exampleInputEmail1">PLease list any operations</label>
        <textarea class="form-control" id="exampleInputEmail1" placeholder="Enter here"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">PLease list your current medications</label>
        <textarea class="form-control" id="exampleInputEmail1" placeholder="Enter here"></textarea>
      </div>
      <h4 class="font-weight-bold">Habits</h4>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Exercise</label>
            <select class="form-control">
              <option>Never</option>
              <option>1-2 days</option>
              <option>3-4 days</option>
              <option>5+ days</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Following a diet</label>
            <select class="form-control">
              <option>Loose diet</option>
              <option>Strict diet</option>
              <option>No diet plan</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Alcohol Consumption</label>
            <select class="form-control">
              <option>Doesn't drink</option>
              <option>1-2 glasses/day</option>
              <option>3-4 glasses/day</option>
              <option>5+ glasses/day</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Caffeine Consumption</label>
            <select class="form-control">
              <option>No caffeine</option>
              <option>1-2 cups/day</option>
              <option>3-4 cups/day</option>
              <option>5+ cups/day</option>
            </select>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  </div>
</div>
@endsection
@section('custom-js')
<script src="{{ asset('../assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
  $('#date').datetimepicker({
        format: 'L'
    });
</script>
@endsection
