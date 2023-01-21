<!-- Navbar -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

    <!-- Authentication Links -->
    @guest
    @if (Route::has('login'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
    @endif
    @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
    @endif
    @else
    <li class="nav-item">
      <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
       <p class="text-white">
         <!-- {{ Auth::user()->owner_name }} -->
       </p>
     </a>
    </li>
    @endguest

    @if(auth()->user()->role == 'user')
    <li class="nav-item d-none d-sm-inline-block">
      <a href="
        @if(auth()->user()->role == 'user')
        {{url('profilperusahaan')}}
        @else
        {{url('profilsayaadmin')}}
        @endif" class="nav-link"> 
        <p class="text-dark">
          Profile
        </p>
      </a>
    </li>
    @endif


  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
        <p class="text-dark">
          Log out
        </p>
      </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>

</nav>
<!-- /.navbar -->


