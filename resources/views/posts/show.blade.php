@section('title', '| Event')

<link rel="stylesheet" type="text/css" href="{{ asset('css/parsely.css')}}">
<link rel="stylesheet" type="text/css" href="/css/ImageLib.css">
@extends('main')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">

      <h1>{{$post->title}}</h1>
      <p class="lead">{{$post->body}}</p>
  </div>
  <div class="col-md-4">
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
            {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=> 'btn btn-primary btn-block')) !!}
        </div>
        <div class="col-sm-3">
            {!! Html::linkRoute('posts.create', 'create post', array($post->id), array('class'=> 'btn btn-primary btn-block')) !!}
        </div>
        <div class="col-sm-3">
            {!! Html::linkRoute('photos', 'Add Photo', array($post->id), array('class'=> 'btn btn-primary btn-block')) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE'])!!}
            {!! Form::submit('Delete', array('class'=> 'btn btn-danger btn-block')) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
</div>
</div>
<hr />
<div class="well">
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
</div>





@endsection
