@section('title', '| Volunteering Events')
@extends('main')
@include('partials._head')

@include('partials._nav2')


<body id="page-top" class="index">

<section>


<div class="container">
  <div class="row">
    <div class="col-md-10">
      <h1>Volunteering Events</h1>
    </div>
    <div class="col-md-2">
      @if (Auth::user())
      <a href="{{route('posts.create')}}" class="btn btn-lg btn-primary">Create Post</a>
    @endif
    </div>
  </div>
  </div>
    <hr />
    <div class="container-fluid">


      <div class="row text-center">
        @foreach ($posts as $post)

          <div class="col-md-4">
            <div class="card"><a href="{{route('posts.show', $post->slug)}}"><img style="height:20em; width: 20em;" alt="Card image cap" class="card-img-top img-fluid img-thumbnail" src="/storage/avatar/{{$post->avatar_photo}}" /></a>
              <div class="card-block" style="margin-bottom: 1em;">
                <a href="{{route('posts.show', $post->slug)}}"><h4 class="card-title" style="word-wrap: break-word;">{{$post->title}}</h4></a>
                <h5>Date:  {{ date('F d, Y', strtotime($post->start)) }}</h5>
                <h5>Time: {{ date('g:i a', strtotime($post->start)) }} - {{ date('g:i a', strtotime($post->end)) }}</h5>
                <h5 class="card-title" style="word-wrap: break-word; margin-top: -.5em;"> Location: {{$post->address_city}}</h5>
                {{-- <h6 class="card-title" style="word-wrap: break-word; margin-top: -.5em;">{{$post->address_street}}</h6> --}}
                <p class="card-text" style="word-wrap: break-word;">{{substr($post->description, 0, 30)}}{{strlen($post->description) > 50 ? "..." : ""}}</p>
                <a href="{{route('posts.show', $post->slug)}}" class="btn btn-primary">View</a>
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

@include('partials._footer')
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
<script src="js/agency.min.js"></script>

</body>


{{-- src="/storage/app/public/avatar/{{$post->avatar_photo}}" --}}

{{-- src="https://images.pexels.com/photos/459099/pexels-photo-459099.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" --}}
