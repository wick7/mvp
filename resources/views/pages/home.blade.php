



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
            <div class="intro-lead-in">A Platform Creating A Simplified Volunteering Experience</div>
            <a href="#about" class="page-scroll btn btn-xl" style="margin-top:3em;margin-right: 2em;">Tell Me More</a>
            <a href="{{ url('posts') }}" class="page-scroll btn btn-xl" style="margin-top:3em;margin-right: 2em;">Show Me More</a>
        </div>
    </div>
</header>


<!-- Recent Section -->

<section id="recent" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading" style="margin-bottom: 2em;">RECENTLY ADDED</h2>
                {{-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
            </div>
        </div>
        <div class="row text-center">
          @foreach ($posts as $post)


          <div class="col-md-4">
            <div class="card"><a href="{{route('posts.show', $post->id)}}"><img style="height:20em; width: 20em;" alt="Card image cap" class="card-img-top img-fluid img-thumbnail" src="/storage/avatar/{{$post->avatar_photo}}" /></a>
              <div class="card-block" style="margin-bottom: 1em;">
                <a href="{{route('posts.show', $post->id)}}"><h4 class="card-title" style="word-wrap: break-word;">{{$post->title}}</h4></a>
                <h5>Date:  {{ date('F d, Y', strtotime($post->start)) }}</h5>
                <h5>Time: {{ date('g:i a', strtotime($post->start)) }} - {{ date('g:i a', strtotime($post->end)) }}</h5>
                <h5 class="card-title" style="word-wrap: break-word; margin-top: -.5em;"> Location: {{$post->address_city}}</h5>
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
                <h2 class="section-heading" style="margin-bottom: 2em;">About</h2>
                {{-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <i style="font-size: 150px;"class="fa fa-users fa-5x"></i>
                <h4 class="service-heading">In a given year, 25% of americans volunteer, only 33% do so next year</h4>
                <p class="text-muted">We help make finding volunteering events easier</p>
            </div>

            <div class="col-md-4">
                <i style="font-size: 150px;"class="fa fa-clock-o fa-5x"></i>
                <h4 class="service-heading">85% of non profit organizations need volunteers to operate effectively</h4>
                <p class="text-muted">We find and post upcoming events in your community</p>
            </div>

            <div class="col-md-4">
                <i style="font-size: 150px;"class="fa fa-level-up fa-5x"></i>
                <h4 class="service-heading">Our goal is to create a sustainable volunteering experience</h4>
                <p class="text-muted">We work directly with Nonprofits to ensure the quality of our info</p>
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
