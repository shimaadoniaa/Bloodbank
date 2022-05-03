<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{asset('adminlte/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Blood Bank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Shimaa</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

           <li class="nav-item">
            <a href="{{url(route('category.index'))}}" class="nav-link">
              <i class="fas fa-list nav-icon"></i>
              <p>Categories</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{url(route('governorate.index'))}}" class="nav-link">
              <i class="fas fa-city nav-icon"></i>
              <p>Governorates</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('city.index'))}}" class="nav-link">
              <i class="fas fa-city nav-icon"></i>
              <p>Cities</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('post.index'))}}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Posts</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{url(route('donation.index'))}}" class="nav-link">
              <i class="fas fa-donate nav-icon"></i>
              <p>Donations Requests</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('contact.index'))}}" class="nav-link">
              <i class="fas fa-phone nav-icon"></i>
              <p>Contact Us</p>
            </a>
          </li>

            <li class="nav-item menu-is-opening menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        User
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: block;">
                    <li class="nav-item">
                        <a href="{{url(route('roles.index'))}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Role List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url(route('users.index'))}}" class="nav-link">
                            <i class="far fa-user nav-icon"></i>
                            <p>user List</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="{{url(route('change-password'))}}" class="nav-link">
                    <i class="fas fa-lock nav-icon"></i>
                    <p>ChangePassword</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{url(route('setting.index'))}}" class="nav-link">
                    <i class="fas fa-circle nav-cogs"></i>
                    <p>Setting</p>
                </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
