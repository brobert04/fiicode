<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="#">HealthHub</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Features</a></li>
          <li><a class="nav-link scrollto" href="#testimonials">Testimonials</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      @if(Route::has('login'))
        @auth
          <a href="{{ route('dashboard') }}" class="appointment-btn scrollto"><span class="d d-md-inline">Dashboard</a>
        @else
          <a href="{{ route('login') }}" class="appointment-btn scrollto"><span class="d d-md-inline">Login</a>
        @endauth
      @endif
    </div>
  </header>
