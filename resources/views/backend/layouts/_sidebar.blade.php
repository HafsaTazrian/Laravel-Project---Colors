<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar" style="background-color: #adbc9f;">

<ul class="sidebar-nav" id="sidebar-nav" style="background-color: #adbc9f;" >
  
  @if(Auth::user()->is_admin == 0)
  <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'dashboard') collapsed @endif  " href="{{ url('panel/dashboard_user') }}" style="background-color: #adbc9f;">
      <i class="bi bi-grid" ></i>
      <span >Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  @endif

<!-- Don't need to show user and category menu for user login, so condition made -->
  @if(Auth::user()->is_admin == 1)
  <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'dashboard') collapsed @endif  " href="{{ url('panel/dashboard') }}" style="background-color: #adbc9f;">
      <i class="bi bi-grid" ></i>
      <span >Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'user') collapsed @endif " href="{{ url('panel/user/list') }}" style="background-color: #adbc9f;">
      <i class="bi bi-person" ></i>
      <span>Users</span>
    </a>
  </li><!-- End user Page Nav -->


  <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'category') collapsed @endif " href="{{ url('panel/category/list') }}" style="background-color: #adbc9f;">
    <i class="bi bi-tags" ></i>
      <span>Category</span>
    </a>
  </li><!-- End Category Page Nav -->
  @endif

  <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'blog') collapsed @endif " href="{{ url('panel/blog/list') }}" style="background-color: #adbc9f;">
    <i class="bi bi-pen" ></i>
      <span>Blogs</span>
    </a>
  </li><!-- End Blogs Page Nav -->

<!-- not showing page menu if user login -->
  @if(Auth::user()->is_admin == 1)
  <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'page') collapsed @endif " href="{{ url('panel/page/list') }}" style="background-color: #adbc9f;">
    <i class="bi bi-file-earmark"></i>
      <span>Page</span>
    </a>
  </li>
  @endif

  <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'change-password') collapsed @endif " href="{{ url('panel/change-password') }}" style="background-color: #adbc9f;">
    <i class="bi bi-key"></i>
      <span>Change Password</span>
    </a>
  </li>

  <!-- <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'help') collapsed @endif " href="{{ url('panel/help/list') }}" style="background-color: #adbc9f; ">
      <i class="bi bi-question-circle" ></i>
      <span>F.A.Q/ Help</span>
    </a>
  </li> -->
  <!-- End F.A.Q/ Help Page Nav -->

  <!-- <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'inbox') collapsed @endif " href="{{ url('') }}l" style="background-color: #adbc9f; ">
      <i class="bi bi-envelope" ></i>
      <span>Inbox</span>
    </a>
  </li> -->
  <!-- End Inbox Page Nav -->

  

</ul>

</aside><!-- End Sidebar-->