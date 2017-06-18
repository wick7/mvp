


<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css')}}">
@section('title')
@extends('main')
@section('content')
      <div class="container-fluid">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

          <!-- Indicators -->
          <ol class="carousel-indicators">

            <li data-target="#myCarousel" data-slide-to="0"class="active" ></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">

              <img class="carousel-img" src="https://images.pexels.com/photos/68147/waterfall-thac-dray-nur-buon-me-thuot-daklak-68147.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Los Angeles">
              <div class="carousel-caption">
                <h1 style="color: white;font-size: 5rem;">FUCK'N A</h1>
              </div>
            </div>

            <div class="item">
              <img  class="carousel-img" src="https://images.pexels.com/photos/429248/pexels-photo-429248.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Chicago">
            </div>

            <div class="item">
              <img class="carousel-img" src="https://images.pexels.com/photos/290657/pexels-photo-290657.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="New York">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

        <div class="container">
          <div class="row">
            <div class="col-md-12 col-xs-12 col-lg-12 text-center jumbotron" style="margin-top: 1em;">
              <h1>EVENTS</h1>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-6 col-lg-4">
              <div class="card"><img alt="Card image cap" class="card-img-top img-fluid" src="https://s-media-cache-ak0.pinimg.com/736x/55/03/94/550394c428e268868aa73e509302b84c.jpg" />
                <div class="card-block" style="margin-bottom: 1em;">
                  <h4 class="card-title" style="word-wrap: break-word;">{{$post->title}}</h4>
                  <p class="card-text" style="word-wrap: break-word;">{{substr($post->body, 0, 50)}}{{strlen($post->body) > 50 ? "..." : ""}}</p>
                  <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">View</a>
                  <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
                </div>
              </div>
            </div>
            @endforeach


          </div>
        </div>
@endsection
