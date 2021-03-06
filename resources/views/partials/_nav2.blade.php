
@include('partials._head')

<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" style="background-color:#440666;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            {{-- <a class="navbar-brand page-scroll" href="{{ url('/') }}">CP</a> --}}
            <a class="navbar-brand page-scroll" href="{{ url('/') }}"><img class="logo" style="width:4em;height:4em;" src="/images/logo.svg"/></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('posts') }}" style="color: white;">Listing</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
