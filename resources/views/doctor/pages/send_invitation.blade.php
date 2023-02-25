@extends('doctor.template')
@section('title', 'Medicool | Send Patient Invitation')
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
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Send</button></div>
            <!-- /.card-footer -->
        </form>
    </div>
    @if(!empty($invitations))
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Invites Sent</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <tr style="text-align: center;">
                        <th>Email</th>
                        <th>Created At</th>
                    </tr>
                    @foreach($invitations as $invitation)
                    <tr style="text-align: center;">
                        <td>{{$invitation->email}}</td>
                        <td>{{$invitation->created_at}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endif
@endsection
