@extends('doctor.template')
@section('title', 'Medicool | Patients')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">My Patients</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="patients" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Full Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Birth Date</th>
          <th>Photo</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($patients as $patient )
        <tr>
          <td>
            <a href="{{ route('doctor.patients', ['patient' => $patient->id]) }}">{{ $patient->user->name }}</a></td>
          <td>{{ $patient->user->email }}</td>
          <td>{{ $patient->phone }}</td>
          <td>{{ $patient->address }}</td>
          <td>{{ $patient->bod }}</td>
          <td>
            <img src="https://ui-avatars.com/api/?name={{ $patient->user->name }}&background=random&size=128" alt="{{ $patient->user->name }} Avatar" class="img-size-50 mr-3">
          </td>
          <td class="text-center">
            <a href="{{ route('doctor.health-file.pdf', $patient->id) }}" class="btn btn-primary text-white" title="See latest health-file" target="_blank">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('doctor.health-file', $patient->id) }}" class="btn btn-success text-white" title="Create new health file">
              <i class="fas fa-plus"></i>
            </a>
            <form id="delete-form-{{ $patient->id }}" action={{ route('doctor.patients.delete', $patient->id) }} method="post" style="display:inline-block;">
              @csrf
              @method('DELETE')
            </form>
            <a class="btn btn-danger text-white" style="cursor: pointer" onclick="if(confirm('Confirmați ștergerea utilizatorului {{$patient->user->name}}?')){
              event.preventDefault();
              document.getElementById('delete-form-'+{{$patient->id}}).submit();}
              ">
              <i class="fas fa-trash"></i>
            </a>
          </td>
          @endforeach
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
@section('custom-js')
<script>
    $(function () {
      $("#patients").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#patients_wrapper .col-md-6:eq(0)');
    });
  </script>
@endsection