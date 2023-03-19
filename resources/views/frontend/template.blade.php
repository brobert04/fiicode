<!DOCTYPE html>
<html lang="en">

@include('frontend.partials.head')

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">healthub@gmail.com</a>
        <i class="bi bi-phone"></i> +40 733 162 131
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
    @include('frontend.partials.header')
  <!-- End Header -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
        <h1>Welcome to HealthHub</h1>
        <h2>Bringing all of your healthcare needs into one easy-to-use platform.</h2>
        <a href="{{route('login')}}" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section><!-- End Hero -->

  <main id="main">
{{--
    <!-- ======= Breadcrumbs Section ======= -->
    @include('medicool.frontend.partials.breadcrumbs')
    <!-- End Breadcrumbs Section --> --}}
        @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('frontend.partials.footer')
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- JS Files -->
    @include('frontend.partials.scripts')
</body>

</html>
