



@section('title')
@extends('main')
@section('content')
@include('partials._head')
@include('partials._nav')

<body id="page-top" class="index">

{{-- <header style="height: 100vh;background-image: url('https://images.pexels.com/photos/105234/pexels-photo-105234.jpeg?w=940&h=650&auto=compress&cs=tinysrgb');"> --}}
<header style="height: 100vh;background-image: url('https://images.pexels.com/photos/105234/pexels-photo-105234.jpeg?w=940&h=650&auto=compress&cs=tinysrgb');">

    <div class="container">
        <div class="intro-text">
            <div class="intro-heading">CARROT PATH</div>
            <div class="intro-lead-in">Lorem ipsum dolor sit amet</div>
            <a href="#about" class="page-scroll btn btn-xl" style="margin:1em;">Tell Me More</a>
            <a href="{{ url('posts') }}" class="page-scroll btn btn-xl" style="margin:1em;">Show Me Events</a>
        </div>
    </div>
</header>

<!-- Recent Section -->

<section id="recent" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">RECENTLY ADDED</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row text-center">
          @foreach ($posts as $post)


          <div class="col-md-4">
            <div class="card"><img style="height:20em; width: 20em;" alt="Card image cap" class="card-img-top img-fluid img-thumbnail" src="/storage/avatar/{{$post->avatar_photo}}" />
              <div class="card-block" style="margin-bottom: 1em;">
                <h4 class="card-title" style="word-wrap: break-word;">{{$post->title}}</h4>
                <h5>Date/Time:  {{ date('F d, Y', strtotime($post->start)) }} - {{ date('h:i:sa', strtotime($post->start)) }} - {{ date('h:i:sa', strtotime($post->end)) }}</h5>
                <h5 class="card-title" style="word-wrap: break-word; margin-top: -.5em;">{{$post->address_city}}</h5>
                {{-- <h6 class="card-title" style="word-wrap: break-word; margin-top: -.5em;">{{$post->address_street}}</h6> --}}
                <p class="card-text" style="word-wrap: break-word;">{{substr($post->description, 0, 30)}}{{strlen($post->description) > 50 ? "..." : ""}}</p>
                <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">View</a>
                {{-- @if (Auth::user())
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
              @endif --}}
              </div>
            </div>
          </div>

          @endforeach
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <i style="font-size: 150px;"class="fa fa-bolt fa-5x"></i>
                <h4 class="service-heading">At Vero</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>

            <div class="col-md-4">
                <i style="font-size: 150px;"class="fa fa-bullhorn fa-5x"></i>
                <h4 class="service-heading">Adipisicing Elit</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>

            <div class="col-md-4">
                <i style="font-size: 150px;"class="fa fa-user-circle fa-5x"></i>
                <h4 class="service-heading">Minima Maxime</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>

    </div>
</section>

@include('partials._footer')



<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/ad79f6db6a.js"></script>
<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="js/agency.js"></script>

</body>


@endsection
