
@include('partials._head')
    <body>
@include('partials._nav')
      <div class="main-content">
        @include('partials._messages')
        @yield('content')
      </div>
    </body>

</html>
