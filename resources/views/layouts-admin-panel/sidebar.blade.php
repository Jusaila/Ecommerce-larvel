 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('asset/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('asset/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('categories') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Categories</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('products') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('home-banner') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Home-Banner</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('excellent-product') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Excellent Product List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('excellent') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Excellent Materials</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('testimonials') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Testimonial</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('chooseus') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Why Choose Us</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('content') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Content Type</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('website') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Website Content</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
