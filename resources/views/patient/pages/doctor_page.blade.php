@extends('patient.template')
@section('custom-css')
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
              <h3 class="mt-3">{{ $doctor->user->name }}</h3>
              <p class="text-muted">{{ $doctor->specialty }}</p>
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
                    @foreach (json_decode($doctor->documents) as $d )
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach (json_decode($doctor->documents) as $doc )
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" >
                        <img class="d-block w-100 img-thumbnail" src="../documents/{{ str_replace(' ', '',$doctor->user->name) }}/{{ $doc }}" alt="Second slide">
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
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview mt-2" id="profile-overview">
                  <h5 class="card-title" style="font-size:25px; font-weight:bold;color:#012970;text-decoration: underline;">About</h5>
                <br>
                  <p class="mt-3">
                    {{ $doctor->about }}
                  </p>

                  <h5 class="card-title" style="font-size:25px; font-weight:bold;color:#012970;text-decoration: underline;">Profile Details</h5>
                  <br>
                  <div class="row mb-2 mt-3">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{ $doctor->user->name }}</div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Birthdate</div>
                    <div class="col-lg-9 col-md-8">
                      {{ $doctor->bod }}
                    </div>
                  </div>

                  <div class="row  mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Company</div>
                    <div class="col-lg-9 col-md-8">
                      {{ $doctor->company }}
                    </div>
                  </div>

                  <div class="row  mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Job</div>
                    <div class="col-lg-9 col-md-8">{{ $doctor->specialty }}</div>
                  </div>

                  <div class="row  mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Country</div>
                    <div class="col-lg-9 col-md-8">
                      {{ $doctor->country }}
                    </div>
                  </div>

                  <div class="row  mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6); font-size:18px;">Address</div>
                    <div class="col-lg-9 col-md-8">{{ $doctor->address }}</div>
                  </div>

                  <div class="row  mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ $doctor->phone }}</div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $doctor->user->email }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label" style="color:rgba(1, 41, 112, 0.6);font-size:18px;">No. Patients</div>
                    <div class="col-lg-9 col-md-8">
                      {{$doctor->patients->count()}}
                    </div>
                  </div>

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
@endsection