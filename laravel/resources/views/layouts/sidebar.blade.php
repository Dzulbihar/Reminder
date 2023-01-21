<!-- Main Sidebar Container -->

  <aside class="main-sidebar main-sidebar-custom sidebar-white-primary elevation-4  bg-white">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      <img src="{{asset('gambar/logo_tpks.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light  "><b>TPKS</b></span>
    </a>
    <hr>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('gambar/avatar5.png')}}" width="100%" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('/home')}}" class="d-block  " >
            {{ Auth::user()->name }} 
          </a>
        </div>
      </div>
      <hr>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item ">
              <a href="{{url('/home')}}" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>
           
@if(auth()->user()->role == 'Admin')
            <li class="nav-item ">
              <a href="{{url('/master_user')}}" class="nav-link">
                <i class="nav-icon fa fa-exclamation-circle"></i>
                <p> Master user </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="{{url('/kendala')}}" class="nav-link">
                <i class="nav-icon fa fa-exclamation-circle"></i>
                <p> Kendala </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="{{url('/jenis_request')}}" class="nav-link">
                <i class="nav-icon fa fa-exclamation-circle"></i>
                <p> Jenis Request </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="{{url('/kategori')}}" class="nav-link">
                <i class="nav-icon fa fa-exclamation-circle"></i>
                <p> Kategori </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="{{url('/email')}}" class="nav-link">
                <i class="nav-icon fa fa-exclamation-circle"></i>
                <p> Email </p>
              </a>
            </li>
@endif

@if(auth()->user()->role == 'User' && auth()->user()->status == '1')
            <li class="nav-item ">
              <a href="{{url('/kendala')}}" class="nav-link">
                <i class="nav-icon fa fa-exclamation-circle"></i>
                <p> Kendala </p>
              </a>
            </li>
@endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->


</aside>    