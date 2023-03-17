@extends('doctor.template')
@section('title', 'Appointment Requests')
@section('custom-css')
<link rel="stylesheet" href="{{asset('../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@endsection
@section('content')
<div class="card card-dark">
    <div class="card-header">
      <h3 class="card-title">Appointment Requests</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      #
                  </th>
                  <th style="width: 20%">
                      Patient Name
                  </th>
                  <th style="width: 30%">
                      Reason
                  </th>
                  <th>
                      Date & Time
                  </th>
                  <th style="width: 8%" class="text-center">
                      Status
                  </th>
                  <th style="width: 20%">
                  </th>
              </tr>
          </thead>
          <tbody>
            @foreach ($app as $a )
            <tr>
                <td>
                    #
                </td>
                <td>
                    <a>
                        {{ $a->name }}
                    </a>
                    <br/>
                    <small>
                        {{ $a->email }}
                    </small>
                </td>
                <td>
                    {{$a->reason}}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($a->date)->format('d/m/Y') }}
                    <br>
                    <small>
                        {{ \Carbon\Carbon::parse($a->time)->format('H:i')}}
                    </small>
                </td>
                <td class="project-state">
                    @if($a->status === 'success')
                    <span class="badge badge-success">Success</span>
                    @elseif($a->status === 'pending')
                    <span class="badge badge-warning">Pending</span>
                    @else
                    <span class="badge badge-danger">Rejected</span>
                    @endif
                </td>
                <td class="project-actions text-right">
                    @if($a->status === 'pending')
                        <a class="btn btn-success btn-sm" id="accept" href="#">
                        <i class="fas fa-check"></i>
                        </a>
                        <form style="display: inline-block" action="{{route('doctor.appointment-requests.reject', $a->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-danger btn-sm" id="reject">
                                <i class="fas fa-window-close"></i>
                            </button>
                        </form>
                    @endif
                        <form style="display: inline-block" action="{{route('doctor.appointment-requests.delete', $a->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" id="delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
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
<script src="{{asset('../assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
     $(document).on('click', '#accept', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Good job!',
                text: "Let's schedule the appointment in the calendar!",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Go to Calendar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{route('calendar.index')}}";
                }
            })
        });

        $(document).on('click', '#reject', function (e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var dataID = form.data('id');
            Swal.fire({
                title: 'Are you sure you want to reject the appointment?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });

     $(document).on('click', '#delete', function (e) {
         e.preventDefault();
         var form = $(this).closest('form');
         var dataID = form.data('id');
         Swal.fire({
             title: 'Are you sure you want to delete the appointment?',
             text: "You won't be able to revert this!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes'
         }).then((result) => {
             if (result.isConfirmed) {
                 form.submit();
             }
         })
     });

</script>
@endsection
