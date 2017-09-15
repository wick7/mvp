@section('title', '| Events')

{{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/parsely.css')}}">
<link rel="stylesheet" type="text/css" href="/css/ImageLib.css"> --}}
@extends('main')
@section('content')
@include('partials._head')
@include('partials._nav2')

<section>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <a href="{{$post->org_site}}" target="_blank"><h1>{{$post->title}}</h1></a>
      <h4 style="display:inline-block;margin-right: 10px;">Organization:</h4>
      <a style="display:inline-block;"  href="{{$post->org_site}}" target="_blank"><h4>{{$post->org_name}}</h4></a>

      <h5>Date: {{ date('F d, Y', strtotime($post->start)) }}</h5>
      <h5>Time: {{ date('g:i a', strtotime($post->start)) }} - {{ date('g:i a', strtotime($post->end)) }}</h5>
      <h5>Location: {{$post->address_city}}</h5>

      <div class="row">
        <div class="col-md-12">
          <h2>Description:</h2>
          <p class="lead" style="margin-left: -.1em; text-indent: 50px;">{{$post->description}}</p>
        </div>
      </div>
  </div>
  <div class="col-md-4">
    <img class="img-thumbnail" src="/storage/avatar/{{$post->avatar_photo}}" />
  </div>
  </div>
</div>

  @if (Auth::user())
    <div class="row">
      <div class="col-md-12">
        {{-- @foreach ($photos as $photo) --}}
          {{-- <p>Title of Photo: {{ $photo->title }}</p> --}}
          {{-- <img style="width: 5em; height: 5em;" src="/storage/photo/{{$photo->post_photo}}">
      @endforeach --}}
      </div>
  </div>
  <div class="col-md-12">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Create At:</dt>
          <dd>{{date('M dS, Y', strtotime($post->created_at))}}</dd>
      </dl>
      <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{date('M dS, Y', strtotime($post->updated_at))}}</dd>
      </dl>
      <div class="row">
          <div class="col-sm-3">
            {!! Html::linkRoute('posts.edit', 'Edit Post', array($post->slug), array('class'=> 'btn btn-primary btn-block')) !!}
        </div>
        <div class="col-sm-3">
            {!! Html::linkRoute('photos', 'Add Photo', array($post->slug), array('class'=> 'btn btn-primary btn-block')) !!}
        </div>
        <div class="col-sm-3">
            {!! Html::linkRoute('posts.create', 'New Post', array($post->slug), array('class'=> 'btn btn-primary btn-block')) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::open(['route' => ['posts.destroy', $post->slug], 'method' => 'DELETE'])!!}
            {!! Form::submit('Delete', array('class'=> 'btn btn-danger btn-block')) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
<hr />
{{-- <div class="well">
    <div class="row">
 <h4>Photos From Event</h4>
  @foreach ($photos as $photo)
  <ul style="list-style: none;">
   <p>Title of Photo: {{ $photo->title }}</p>
   <li class="crop">

    <img style="width: 100%" src="/storage/photo/{{$photo->post_photo}}">

    </li>
    {!! Form::open(['route' => ['photos', $photo->id], 'method' => 'DELETE'])!!}
            {!! Form::submit('Delete', array('class'=> 'btn btn-danger btn-block')) !!}
            {!! Form::token() !!}
            {!! Form::close() !!}
    {!! Html::linkRoute('photos_edit', 'Edit', array($photo->id), array('class'=> 'btn btn-primary btn-block')) !!}
    </ul>

@endforeach
</div>
</div> --}}

@endif
</div>
</section>
@include('partials._footer')

@endsection
