@extends('patient.template')
@section('title', 'Medicool | Medical History')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Medical history for <span style="color:red;">{{ auth()->user()->name }}</span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>Reason for seeing the doctor</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($files as $h )
          <tr>
            <td>{{ $h->symptoms }}</td>
            <td>
                {{ \Carbon\Carbon::parse($h->date)->format('d/m/Y') }}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection