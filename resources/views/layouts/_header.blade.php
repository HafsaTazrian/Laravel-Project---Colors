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
          <span class="text-primary" style="color: #436850;">Colors</span>
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
          <div class="navbar-nav font-weight-bold mx-auto py-0">
            <a href="{{ url('') }}" class="nav-item nav-link active">Home</a>
            <a href="{{ url('about') }}" class="nav-item nav-link">About</a>
            <a href="{{ url('blog') }}" class="nav-item nav-link">Blogs</a>
            <a href="{{ url('teams') }}" class="nav-item nav-link">Teams</a>
            <a href="{{ url('gallery') }}" class="nav-item nav-link">Gallery</a>
            <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a>
          </div>
          <a href="{{ url('register') }}" class="btn btn-primary px-4" style="background-color: #436850; color: white;">Register</a>
          <a href="{{ url('login') }}" class="btn btn-primary px-4" style="margin-left: 8px;background-color: #436850; color: white;">Login</a>  
        </div>
      </nav>
    </div>
    <!-- Navbar End -->