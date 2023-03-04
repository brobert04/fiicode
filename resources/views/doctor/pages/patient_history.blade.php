@extends('doctor.template')
@section('title', 'Patient History | ' . $patient->user->name)
@section('content')
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">     
         <img src="https://ui-avatars.com/api/?name={{ $patient->user->name }}&background=random&size=128" alt="{{ $patient->user->name }} Avatar" class="profile-user-img img-fluid img-circle">
      </div>

      <h3 class="profile-username text-center">{{ $patient->user->name }}</h3>

      <p class="text-muted text-center">{{ \Carbon\Carbon::parse($patient->bod)->age }} years</p>

      <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
          <b>Patient since</b> <a class="float-right">{{ \Carbon\Carbon::parse($patient->user->created_at)->format('d/m/Y') }}</a>
        </li>
        <li class="list-group-item">
          <b>Health Reports</b> <a class="float-right">{{ $health->count() }}</a>
        </li>
        <li class="list-group-item">
          <b>Next Appointment</b> <a class="float-right">-</a>
        </li>
      </ul>

      <a href="#" class="btn btn-primary btn-block" id="show"><b>See History</b></a>
    </div>
    <!-- /.card-body -->
  </div>

  <div class="card" hidden>
    <div class="card-header">
      <h3 class="card-title">Medical history for <span style="color:red;">{{ $patient->user->name }}</span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>Reason/Symptoms</th>
            <th>Date</th>
            <th>Health File</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($health as $h )
          <tr>
            <td>{{ $h->symptoms }}</td>
            <td>
                {{ \Carbon\Carbon::parse($h->date)->format('d/m/Y') }}
            </td>
            <td>
                <a href="{{ route('doctor.health-file.profile', $h->date) }}" class="btn btn-primary text-white" title="See health-file" target="_blank">
                    <i class="fas fa-eye"></i>
                  </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
@section('custom-js')
<script>
    $(function () {
        $('#show').click(function (e) { 
            e.preventDefault();
            $('.card').removeAttr('hidden');
        });
    });
</script>
@endsection