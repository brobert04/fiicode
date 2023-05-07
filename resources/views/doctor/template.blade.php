<!DOCTYPE html>
<html lang="en">
@include('doctor.partials.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  @include('doctor.partials.preloader')

  <!-- Navbar -->
  @include('doctor.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('doctor.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
          <div class="floating-chat">
              <i class="fa fa-comments" aria-hidden="true"></i>
              <div class="chat">
                  <div class="header">
              <span class="title">
                  Optiwork Chatbot
              </span>
                      <button>
                          <i class="fa fa-times" aria-hidden="true"></i>
                      </button>

                  </div>
                  <ul class="messages">
                      <li class="other">Hello, {{auth()->user()->name}}. How can I help you today?</li>
                  </ul>
                  <div class="footer">
                      <div class="text-box" contenteditable="true" disabled="true" ></div>
                      <button id="sendMessage">send</button>
                  </div>
              </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @include('doctor.partials.footer')

</div>
<!-- ./wrapper -->

@include('doctor.partials.scripts')
</body>
</html>
