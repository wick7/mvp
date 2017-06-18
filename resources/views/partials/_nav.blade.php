<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand active" href="{{ url('/') }}"><span class="glyphicon glyphicon-leaf"></span> Fuck'n A</a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-align-center"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('/') }}">HOME</a></li>
            <li><a href="{{ url('about') }}">ABOUT</a></li>
            <li><a href="{{ url('contact') }}">CONTACT</a></li>
            <li><a href="{{ url('posts') }}">BLOG</a></li>
          </ul>
        </li>
      </ul>

    </div>
  </div>
</nav>
