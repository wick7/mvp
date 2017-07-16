@section('title', '| Event')

<link rel="stylesheet" type="text/css" href="{{ asset('css/parsely.css')}}">

@extends('main')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>{{$post->title}}</h1>
      <h3>{{$post->address_city}}</h3>
      <h4>{{$post->address_street}}</h4>
      <p class="lead">{{$post->description}}</p>
  </div>
  <div class="col-md-4">
    <img class="img-thumbnail" src='{{$post->address_street}}' />
  </div>
  </div>
  <hr /><div class="container">
    @foreach ($photos as $photo) --}}
      {{-- <p>Title of Photo: {{ $photo->title }}</p> --}}
      <img style="width: 5em; height: 5em;" src="/storage/photo/{{$photo->post_photo}}">
  @endforeach

  </div>

  @if (Auth::user())
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
            {!! Html::linkRoute('posts.edit', 'Edit Post', array($post->id), array('class'=> 'btn btn-primary btn-block')) !!}
        </div>
        <div class="col-sm-3">
            {!! Html::linkRoute('photos', 'Add Photo', array($post->id), array('class'=> 'btn btn-primary btn-block')) !!}
        </div>
        <div class="col-sm-3">
            {!! Html::linkRoute('posts.create', 'New Post', array($post->id), array('class'=> 'btn btn-primary btn-block')) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE'])!!}
            {!! Form::submit('Delete', array('class'=> 'btn btn-danger btn-block')) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
@endif
</div>
</div>





@endsection
