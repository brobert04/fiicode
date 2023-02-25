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
