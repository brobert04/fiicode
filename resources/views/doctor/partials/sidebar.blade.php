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
          <li class="nav-header">PATIENTS</li>
          <li class="nav-item">
            <a href="{{route('doctor.send-invite')}}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                  Invite Patients
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('doctor.patients')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                  All Patients
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('doctor.transfer.patients.index')}}" class="nav-link">
              <i class="nav-icon fas fa-arrow-right"></i>
              <p>
                  Transfer Patients
              </p>
            </a>
          </li>
          <li class="nav-header">CALENDAR</li>
          <li class="nav-item">
            <a href="{{route('calendar.index')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                  Calendar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('doctor.appointment-requests')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                  Appointment Requests
              </p>
            </a>
          </li>
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="{{route('doctor.profile')}}" class="nav-link">
              <i class="nav-icon fas fa-pen"></i>
              <p>
                  Edit profile
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
