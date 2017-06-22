


<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css')}}">
@section('title')
@extends('main')
@section('content')

<div class="container-fluid sec_one">
  <div class="row" style="padding: 3em;"></div>
  <div class="row">
    <div class="col-xs-2 col-md-2 col-sm-2"></div>
    <div class="col-xs-8 col-md-8 col-sm-8 page-header text-center" style="background-color: rgba(255, 255, 255, 0.6); border-radius: 25px;" >
      <h1 class="title m-b-md">CARROT PATH</h1>
      <small style="font-size: 2rem;">Lorem ipsum dolor sit amet</small>
    </div>
    <div class="col-xs-2 col-md-2 col-sm-2"></div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-md-12 col-sm-12 text-center">
      <a href="{{ url('posts') }}"><button class="btn btn-default text-center" style="padding: 1.4rem;border: 1px solid #31034A;">New Events</button></a>
    </div>
  </div>
</div>
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



  <div class="container-fluid sec4">
    <div class="container sec4_wrap">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6 sec4_style" style="border-top:hidden; border-left:hidden;">
          <h1>Utim</h1>
          <img src="https://image.flaticon.com/icons/svg/287/287681.svg">
          <p>Sed ut perspiciatis unde</p><button type="button" class="btn btn-primary">Learn More</button>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 sec4_style" style="border-top:hidden; border-right:hidden;">
          <h1>Unher</h1><img src="https://image.flaticon.com/icons/svg/61/61092.svg">
          <p>Sed ut perspiciatis unde</p><button type="button" class="btn btn-primary">Learn More</button></div>
      </div>
      <!--        <hr class="sec4_hr"> -->
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6 sec4_style" style="border-bottom:hidden; border-left:hidden;">
          <h1>Ipsum</h1><img src="https://image.flaticon.com/icons/svg/149/149125.svg">
          <p>Sed ut perspiciatis unde</p><button type="button" class="btn btn-primary">Learn More</button></div>

        <div class="col-md-6 col-sm-6 col-xs-6 sec4_style" style="border-bottom:hidden; border-right:hidden;">
          <h1>Lorum</h1><img src="https://image.flaticon.com/icons/svg/182/182482.svg">
          <p>Sed ut perspiciatis unde</p><button type="button" class="btn btn-primary">Learn More</button></div>
      </div>
    </div>
  </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 col-xs-12 col-lg-12 text-center" style="font-size: 5em;">
                UPCOMING EVENTS
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
