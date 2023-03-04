@extends('doctor.template')
@section('title', 'Medicool | Send Patient Invitation')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('../assets/plugins/toastr/toastr.min.css') }}">
@endsection
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Send Invitation</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="{{ route('doctor.send-invite.store') }}">
            @csrf
            <div class="card-body">
                <h5 style="margin-bottom: 40px;">In order to add your patients, you need to send them an invitation using their email.</h5>
                <div class="form-group row mt-">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Send</button></div>
            <!-- /.card-footer -->
        </form>
    </div>
    @empty($invitations)
    @else
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Invites Sent</h3>
            </div>  
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr style="text-align: center;">
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invitations as $invitation)
                        <tr style="text-align: center;">
                            <td>
                                {{ $invitation->email }}
                            </td>
                            <td>
                                {{ $invitation->created_at  }}
                            </td>
                            <td>
                                @if($invitation->status === 1)
                                    <span class="badge bg-success">Accepted</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endempty
@endsection
@section('custom-js')
<script src="{{ asset('../assets/plugins/toastr/toastr.min.js') }}"></script>
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
