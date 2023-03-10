@extends('doctor.template')
@section('title', 'Medicool | ' . Auth::user()->name . ' Profile')
@section('custom-css')
 <!-- Google Fonts -->
 <link href="https://fonts.gstatic.com" rel="preconnect">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 <link href="{{ asset('../assets/profile/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
 <link href="{{ asset('../assets/profile/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
 <link href="{{ asset('../assets/profile/vendor/quill/quill.snow.css') }}" rel="stylesheet">
 <link href="{{ asset('../assets/profile/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
 <link href="{{ asset('../assets/profile/vendor/remixicon/remixicon.css') }}" rel="stylesheet">


@endsection
@section('content')
<main id="main" class="main">
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=random&size=128"" alt="Profile" class="rounded-circle">
              <h3 class="mt-3">{{ auth()->user()->name }}</h3>
              <p class="text-muted">{{ auth()->user()->doctor->specialty }}</p>
              @empty($hours)
              @else
              <div class="btn-group">
                <button type="button" class="btn btn-default">
                  @foreach ($hours as $hour)
                  @php
                      $day = $hour['day'];
                      $openingHour = \Carbon\Carbon::parse($hour['start_hour']);
                      $closingHour = \Carbon\Carbon::parse($hour['end_hour']);
                  @endphp
                  @if (\Carbon\Carbon::now()->isDayOfWeek($day))
                      @if (\Carbon\Carbon::now()->between($openingHour, $closingHour))
                          <span style="color:green;">Opened</span>
                      @else
                          <span style="color:red">Closed</span>
                      @endif
                  @endif
                @endforeach
                </button>
                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                  <div class="dropdown-menu" role="menu">
                    @foreach ($hours as $h)
                    @if($h->start_hour && $h->end_hour)
                      <a class="dropdown-item" href="#"><span style="text-transform: capitalize">{{ $h->day }}</span> - <span class="badge bg-success">{{ \Carbon\Carbon::parse($h->start_hour)->format('H:i')}} - {{ \Carbon\Carbon::parse($h->end_hour)->format('H:i')}}</span></a>
                    @else
                      <a class="dropdown-item" href="#">
                        <span style="text-transform: capitalize">{{ $h->day }}</span> - <span class="badge bg-danger">Closed</span>
                      </a>
                    @endif
                    @endforeach
                  </div>
              </div>
              @endempty
              {{-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> --}}
              <hr width="350px">
              <h4 class="text-muted text-center mt-5">Diplomas</h4>
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($documents as $d )
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($documents as $doc )
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" >
                        <img class="d-block w-100 img-thumbnail" src="../documents/{{ str_replace(' ', '',auth()->user()->name) }}/{{ $doc }}" alt="Second slide">
                      </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-custom-icon" aria-hidden="true">
                    <i class="fas fa-chevron-left"></i>
                  </span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-custom-icon" aria-hidden="true">
                    <i class="fas fa-chevron-right"></i>
                  </span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#business-hours">Add Business Hours</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview mt-2" id="profile-overview">
                  <h5 class="card-title" style="font-size:25px; font-weight:bold;color:#012970;text-decoration: underline;">About</h5>
                <br>
                  <p class="mt-3">
                    {{ auth()->user()->doctor->about }}
                  </p>

                  <h5 class="card-title" style="font-size:25px; font-weight:bold;color:#012970;text-decoration: underline;">Profile Details</h5>
                  <br>
                  <div class="row mb-2 mt-3">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Birthdate</div>
                    <div class="col-lg-9 col-md-8">
                      {{ auth()->user()->doctor->bod }}
                    </div>
                  </div>

                  <div class="row  mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Company</div>
                    <div class="col-lg-9 col-md-8">
                      {{ auth()->user()->doctor->company }}
                    </div>
                  </div>

                  <div class="row  mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Job</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->doctor->specialty }}</div>
                  </div>

                  <div class="row  mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Country</div>
                    <div class="col-lg-9 col-md-8">
                      {{ auth()->user()->doctor->country }}
                    </div>
                  </div>

                  <div class="row  mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6); font-size:18px;">Address</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->doctor->address }}</div>
                  </div>

                  <div class="row  mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->doctor->phone }}</div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Email</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">No. Patients</div>
                    <div class="col-lg-9 col-md-8">
                      {{auth()->user()->doctor->patients->count()}}
                    </div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{ route('doctor.profile.update') }}" method="post">
                    {{-- <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profile-img.jpg" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div> --}}
                    @csrf
                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ auth()->user()->name }}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control @error('about') is-invalid @enderror" id="about" style="height: 100px">{{ auth()->user()->doctor->about }}</textarea>
                        @error('about')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control @error('company') is-invalid @enderror" id="company" value="{{ auth()->user()->doctor->company }}">
                        @error('company')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="specialty" class="col-md-4 col-lg-3 col-form-label">Job</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="specialty" type="text" class="form-control @error('specialty') is-invalid @enderror" id="specialty" value="{{ auth()->user()->doctor->specialty }}">
                        @error('specialty')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control @error('country') is-invalid @enderror" id="Country" value="{{ auth()->user()->doctor->country }}">
                        @error('country')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="Address" value="{{ auth()->user()->doctor->address }}">
                        @error('address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="Phone" value="{{ auth()->user()->doctor->phone }}">
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="Email" value="{{ auth()->user()->email }}">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                      <div class="col-md-8 col-lg-9">
                       <select class="custom-select" id="gender" name="gender">
                        <option value="male" {{(auth()->user()->doctor->gender== "male" ? 'selected' : "") }}>Male</option>
                        <option value="female" {{(auth()->user()->doctor->gender== "female" ? 'selected' : "") }}>Female</option>
                       </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="date" class="col-md-4 col-lg-3 col-form-label">Birthdate</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value={{ auth()->user()->doctor->bod }}>
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    {{-- <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                      </div>
                    </div> --}}

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="business-hours">
                  <form action="{{ route('doctor.profile.business-hours') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                      <label for="day" class="col-md-4 col-lg-3 col-form-label">Day</label>
                      <div class="col-md-8 col-lg-9">
                        <select id="day" name="day" class="form-control">
                          <option value="monday">Monday</option>
                          <option value="tuesday">Tuesday</option>
                          <option value="wednesday">Wednesday</option>
                          <option value="thrusday">Thursday</option>
                          <option value="friday">Friday</option>
                          <option value="satuday">Saturday</option>
                          <option value="sunday">Sunday</option>
                        </select>
                        @error('day') <span class="text-danger small">{{$message}}</span>@enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="start_hour" class="col-md-4 col-lg-3 col-form-label">Start Hours</label>
                      <div class="col-md-8 col-lg-9">
                        <input id="start_hour" type="time" name="start_hour" class="form-control">

                        @error('start_hour') <span class="text-danger small">{{$message}}</span>@enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="end_hour" class="col-md-4 col-lg-3 col-form-label">End Hours</label>
                      <div class="col-md-8 col-lg-9">
                        <input id="end_hour" type="time" name="end_hour" class="form-control">
                        
                        @error('end_hour') <span class="text-danger small">{{$message}}</span>@enderror
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Hours</button>
                      <a class="btn btn-primary" id="edit" onclick="toggleTable()">Edit Hours</a>
                    </div>
                  </form>
                  <div class="card mt-4" id="edit-hours" style="display: none">
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>Day</th>
                            <th>Opening Hours</th>
                            <th>Closing Hours</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($hours as $ho )
                          <tr>
                            <td style="text-transform: capitalize;">{{ $ho->day }}</td>
                            <td style="color:green">
                              {!! $ho->start_hour && $ho->end_hour ? \Carbon\Carbon::parse($ho->start_hour)->format('H:i') : '<span style="color:red">Closed</span>' !!}
                            </td>
                            <td style="color:red;">
                              {{ $ho->start_hour && $ho->end_hour ? \Carbon\Carbon::parse($ho->end_hour)->format('H:i') : 'Closed' }}
                          </td>
                            <td>
                                <a href="{{ route('doctor.profile.business-hours.edit',$ho->id) }}" class="btn btn-primary text-white" title="See health-file">
                                    Edit
                                </a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="{{ route('doctor.profile.password') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="currentPassword">
                        @error('password') <span class="text-danger small">{{$message}}</span>@enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" id="newPassword">
                        @error('newpassword') <span class="text-danger small">{{$message}}</span>@enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control @error('renewpassword') is-invalid @enderror" id="renewPassword">
                        @error('renewpassword') <span class="text-danger small">{{$message}}</span>@enderror
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main>
@endsection
@section('custom-js')
<!-- Vendor JS Files -->
<script src="{{ asset('../assets/profile/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('../assets/profile/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('../assets/profile/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('../assets/profile/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('../assets/profile/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('../assets/profile/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('../assets/profile/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('../assets/profile/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('../assets/profile/js/main.js') }}"></script>
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
<script>
  function toggleTable() {
    var table = document.getElementById("edit-hours");
    if (table.style.display === "none") {
      table.style.display = "block";
    } else {
      table.style.display = "none";
    }
  }
</script>
@endsection