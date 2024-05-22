 <!-- Navbar Start -->
 <div class="container-fluid bg-light position-relative shadow"  >
      <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5" 
      >
        <a
          href="{{ url('') }}" 
          class="navbar-brand font-weight-bold text-secondary"
          style="font-size: 50px;" 
        >
          <img src="{{ url('assets/img/splashLogo.png') }}" alt="" width="50" height="50">
          <span class="text-primary" >Colors</span>
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse"
        >
        @php
          $getCategoryHeader = App\Models\CategoryModel::getCategoryMenu();
        @endphp
          <div class="navbar-nav font-weight-bold mx-auto py-0">
            <a href="{{ url('') }}" class="nav-item nav-link @if( Request::segment(1)  =='')
            active  @endif">Home </a>
            <!-- <a href="{{ url('blog') }}" class="nav-item nav-link">Blogs</a> -->
            @foreach($getCategoryHeader as $CategoryHeader)
              <a href="{{ url(''.$CategoryHeader->slug) }}" class="nav-item nav-link @if( Request::segment(1)  ==$CategoryHeader->slug)
            active  @endif">{{$CategoryHeader->name}}</a> 
            <!-- @if( Request::segment(1)  =='') active  @endif this is for the selection of segment -->
            @endforeach
            <a href="{{ url('gallery') }}" class="nav-item nav-link @if( Request::segment(1)  =='gallery')
            active  @endif">Gallery</a>
            <!-- <a href="{{ url('about') }}" class="nav-item nav-link">About</a>
            <a href="{{ url('teams') }}" class="nav-item nav-link">Teams</a>             -->
            <a href="{{ url('contact') }}" class="nav-item nav-link @if( Request::segment(1)  =='contact')
            active  @endif">Contact</a>
          </div>

          @auth
          <!-- Logout Button using POST method -->
          <form action="{{ route('logout') }}" method="POST" style="display: inline;">
           @csrf
            <button type="submit" class="btn btn-primary px-4">Logout</button>
            @if(Auth::user()->is_admin == 0)
            <a href="{{ url('panel/dashboard_user') }}" class="btn btn-primary px-4" style="margin-left: 8px;">Dashboard</a>
            @endif
            @if(Auth::user()->is_admin == 1)
            <a href="{{ url('panel/dashboard') }}" class="btn btn-primary px-4" style="margin-left: 8px;">Dashboard</a>
            @endif
          </form>
          @endauth

          @guest
          <!-- Register and Login Buttons -->
            <a href="{{ url('register') }}" class="btn btn-primary px-4">Register</a>
            <a href="{{ url('login') }}" class="btn btn-primary px-4" style="margin-left: 8px;">Login</a>
          @endguest
        </div>
      </nav>
    </div>
    <!-- Navbar End -->