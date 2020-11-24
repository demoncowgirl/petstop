<div id='topRight' class='container d-flex flex-column justify-content-start'>
  <nav class="navbar-inverse">
    <div id="smallNavbar" class="container" style="border: none; text-align: center;">
      <div class="navbar-header">
          <!-- <button class="button" type="button"> -->
            <span class = "sr-only">Toggle Navigation</span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
          <!-- </button> -->
        <div class="navbar" id="navbarNav">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is ('vetServices') ? 'active': ''}}">
              <a class="nav-link" href="/vetServices">Veterinary Services</a>
            </li>
            <li class="{{ Request::is ('kennels') ? 'active': ''}}">
              <a class="nav-link" href="/kennels">Kennels and Pet Sitters</a>
            </li>
            <li class="{{ Request::is ('groomers') ? 'active': ''}}">
              <a class="nav-link" href="/groomers">Groomers</a>
            </li>
            <li class="{{ Request::is ('petSupplies') ? 'active': ''}}">
              <a class="nav-link" href="/petSupplies">Pet Food & Supplies</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
	<!-- @yield('content') -->
</div>
