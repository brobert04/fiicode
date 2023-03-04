@section('title', 'Medicool | Doctor Register')
<!DOCTYPE html>
<html lang="en">
@include('auth_custom.partials.head')
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href=""><b>Medi</b>Cool</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new patient account</p>

            <form action="{{ route('patient.register.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="token" id="token" value="{{ $invitation_token }}" hidden>
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Full name" name="name" id="name" required
                           autofocus value={{ old('name') }}>
                    @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Email" value={{ $email }} disabled>
                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" required value={{ $email }} hidden>
                    @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                    @error('password') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" class="form-control" placeholder="Retype password" id="password_confirmation"
                           name="password_confirmation" required>
                    @error('password_confirmation') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="role_id">Register as</label>
                        <select class="form-control" disabled>
                            <option value="patient" selected>Patient</option>
                        </select>
                        <select class="form-control" name="role_id" id="role_id" hidden>
                            <option value="patient" selected>Patient</option>
                        </select>
                </div>
                <div class="form-group mb-3">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">More Information</h3>
                             <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: none;">
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" placeholder="Phone number" id="phone"
                                       name="phone" required>
                                @error('phone') <span class="text-danger small">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" placeholder="Enter address" id="address"
                                       name="address" required>
                                @error('address') <span class="text-danger small">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender">Gender</label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                    </select>
                            </div>
                            <div class="form-group mb-3">
                                        <label for="date">Birthday Date</label>
                                        <input type="date" class="form-control" name="date" id="date">
                                      </div>
                                      @error('date')
                                      <span class="text-danger">{{$message}}</span>
                                      @enderror
                        </div>
                    </div>
                </div>
                <div class="preview-image" id="preview-image">
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <div class="row" style="align-items: baseline;">
                            <div class="col-6">
                                <a href="{{ route('login') }}" class="text-center" style="text-align: center">Already registered?</a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div>
</div>
<!-- /.register-box -->
@include('auth_custom.partials.scripts')

</body>
</html>
