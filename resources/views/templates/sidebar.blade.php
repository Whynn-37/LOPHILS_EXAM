 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-light elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light text-center"><b>LOPHILS_EXAM</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../node_modules/admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block mt-2 ml-2">{{Session::get('last_name') .", ". Session::get('first_name')}}</a>
          <a href="#" class="d-block mt-2 ml-2" id="session_position">({{Session::get('position')}})</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{URL::to('/dashboard')}}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('/users')}}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>