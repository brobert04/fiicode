<nav class="main-header navbar navbar-expand">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('index') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <form action={{ route('logout') }} method="POST">
          @csrf
          <a onclick="event.preventDefault();$(this).closest('form').submit();" class="nav-link text-danger">Logout</a>
        </form>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{url('/chat')}}">
          <i class="far fa-comments"></i>
            <?php
            $notf = \App\Models\ChMessage::where('to_id', auth()->user()->id)->where('seen', 0)->get();
            ?>
            @if($notf->isNotEmpty())
                <span class="badge badge-danger navbar-badge">{{$notf->count()}}</span>
            @endif
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
{{--      <li class="nav-item dropdown">--}}
{{--        <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--          <i class="far fa-bell"></i>--}}
{{--          <span class="badge badge-warning navbar-badge">15</span>--}}
{{--        </a>--}}
{{--        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--          <span class="dropdown-item dropdown-header">15 Notifications</span>--}}
{{--          <div class="dropdown-divider"></div>--}}
{{--          <a href="#" class="dropdown-item">--}}
{{--            <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
{{--            <span class="float-right text-muted text-sm">3 mins</span>--}}
{{--          </a>--}}
{{--          <div class="dropdown-divider"></div>--}}
{{--          <a href="#" class="dropdown-item">--}}
{{--            <i class="fas fa-users mr-2"></i> 8 friend requests--}}
{{--            <span class="float-right text-muted text-sm">12 hours</span>--}}
{{--          </a>--}}
{{--          <div class="dropdown-divider"></div>--}}
{{--          <a href="#" class="dropdown-item">--}}
{{--            <i class="fas fa-file mr-2"></i> 3 new reports--}}
{{--            <span class="float-right text-muted text-sm">2 days</span>--}}
{{--          </a>--}}
{{--          <div class="dropdown-divider"></div>--}}
{{--          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
{{--        </div>--}}
{{--      </li>--}}
{{--      <li class="nav-item">--}}
{{--        <a class="nav-link" data-widget="fullscreen" href="#" role="button">--}}
{{--          <i class="fas fa-expand-arrows-alt"></i>--}}
{{--        </a>--}}
{{--      </li>--}}
        <li class="nav-item">
            <a class="nav-link" role="button" id="dark" title="Change theme">
                <i id="but" class="fas fa-moon"></i>
            </a>
        </li>
    </ul>
  </nav>
