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
        <tr>
        @foreach ($patients as $patient )
          <td>{{ $patient->user->name }}</td>
          <td>{{ $patient->user->email }}</td>
          <td>{{ $patient->phone }}</td>
          <td>{{ $patient->address }}</td>
          <td>{{ $patient->bod }}</td>
          <td>
            <img src="https://ui-avatars.com/api/?name={{ $patient->user->name }}&background=random&size=128" alt="{{ $patient->user->name }} Avatar" class="img-size-50 mr-3">
          </td>
          <td class="text-center">
            <a href="" class="btn btn-primary text-white">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('doctor.health-file', $patient->id) }}" class="btn btn-success text-white">
              <i class="fas fa-edit"></i>
            </a>
            <a href="" class="btn btn-danger text-white">
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