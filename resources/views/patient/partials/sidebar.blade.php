<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ (!empty(Auth::user()->image)) ? url('upload/user_images/' .Auth::user()->image) : 'https://ui-avatars.com/api/?background=random&name='.Auth::user()->name }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Map
              </p>
            </a>
          </li>
          <li class="nav-header">MEDICAL MANAGEMENT</li>
          <li class="nav-item">
            <a href="{{ route('patient.my-doctor') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Doctor Information
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('patient.medical-history') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Medical History
              </p>
            </a>
          </li>
          <li class="nav-header">APPOINTMENTS</li>
          <li class="nav-item">
            <a href="{{ route('patient.make-appointment') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Request Appointment
              </p>
            </a>
          </li>
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="{{route('patient.profile')}}" class="nav-link">
              <i class="nav-icon fas fa-pen"></i>
              <p>
                Edit Profile
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
