@extends('doctor.template')
@section('title', 'Transfer Patients')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('../assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">     
         {{-- <img src="https://ui-avatars.com/api/?name={{ $patient->user->name }}&background=random&size=128" alt="{{ $patient->user->name }} Avatar" class="profile-user-img img-fluid img-circle"> --}}
      </div>

      <h3 class="profile-username text-center font-weight-bold">Transfer Patients</h3>

      <p class="text-muted text-center">Transfer your patients to other doctors</p>
      <form action="{{ route('doctor.transfer.patients.store') }}" method="post">
        @csrf 
        <div class="row text-center">
          <div class="col-md-4">
              <div class="form-group">
                  <label>Choose Patient</label>
                  <select class="form-control select2" style="width: 100%;" id="patient_id" name="patient_id">
                  @foreach ($patients as $patient )
                    <option value='{{ $patient->id }}'>{{ $patient->user->name }}</option>
                  @endforeach
                  </select>
              </div>
          </div>
          <div class="col-md-4" style="display:flex; flex-direction:column; align-items: center; justify-content: center">
              <i class="fas fa-arrow-right"></i>
              <i class="fas fa-arrow-left"></i>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label>Choose Doctor</label>
                  <select class="form-control select2" style="width: 100%;" id="doctor_id" name="doctor_id">
                  @foreach ($doctors as $doctor )
                    <option value={{ $doctor->id }}>{{ $doctor->user->name }}</option>
                  @endforeach
                  </select>
                </div>
          </div>
          <button class="btn btn-block btn-primary mt-4">Transfer</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
@section('custom-js')
<script src="{{ asset('../assets/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(function () {
        ('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })
    });
</script>
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