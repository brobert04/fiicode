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
            <p class="login-box-msg">Register a new doctor account</p>

            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Full name" name="name" id="name" required
                           autofocus value={{ old('name') }}>
                    @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" required value={{ old('email') }}>
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
                        <select class="form-control" name="role_id" id="role_id">
                            <option value="doctor" selected>Doctor</option>
                        </select>
                </div>
                <div class="form-group mb-3">
                    <label for="role_id">Documents</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile1"
                               title="Upload your documents to prove you are a doctor." name='documents[]' multiple required>
                        <label class="custom-file-label" for="customFile1">Upload</label>
                        @error('documents[]') <span class="text-danger small">{{$message}}</span>@enderror
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
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
@include('auth_custom.partials.scripts')
</body>
</html>
