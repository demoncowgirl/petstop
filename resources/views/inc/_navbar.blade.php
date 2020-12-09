<nav class="navbar navbar-inverse navbar-toggleable-md navbar-expand-md">
    <div class="navbar-header">
      <a class ="navbar-brand" href="{{ url('/') }}">
        <div id="imageBlock">
        <img id="logo" src="{{ asset('assets/images/love-825283_640.png') }}" alt="heart with pawprint">
        </div>
          <!-- {{ config('app.name', 'Pet Stop') }} -->
      </a>
    </div>
  <div class="collapse navbar-collapse ">
    <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Home</a></li>
        <!-- <li><a class="{{ Request::is ('blog') ? 'active': ''}}" href="/blog">Blog</a></li> -->
        <li class="nav-item">
          <a class="nav-link" href="{{ url('contact') }}" href="contact">Contact</a></li>
        <!-- <li><a class="nav-link" href="{{ Request::is ('profile') ? 'active': ''}}" href="/profile">Profile</a></li> -->
        <li class="nav-item">
          <a class="nav-link" href="{{ url('serviceSearch') }}" href="serviceSearch">Pet Services</a></li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('petSearch') }}" href="petSearch"> Pet Search</a></li>
        @auth
          @if (Auth::user()->admin)
            <li class="nav-item"><a class="{{ Request::is ('messages') ? 'active': ''}}" href="/messages">Messages</a></li>
            <li class="nav-item"><a class="{{ Request::is ('users') ? 'active': ''}}" href="/users_index">Users</a></li>
          @endif
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }}</a>
              <ul class="dropdown-menu">
                 <li><a class ="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a></li>
              </ul>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           {{ csrf_field() }}
              </form>
            </li>
            @else
          <li class="nav-item">
            <a class ="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class ="nav-link" href="{{ route('register') }}">Register</a>
          </li>
        @endauth
      </ul>
    </div>
</nav>
<div id="ribbon1" class="row"></div>
<div id="ribbon2" class="row"></div>
