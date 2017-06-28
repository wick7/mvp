@section('title', '| Event')

<link rel="stylesheet" type="text/css" href="{{ asset('css/parsely.css')}}">

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
            {!! Form::open(['route' => ['photos.create', $post->id], 'method' => 'POST'])!!}
            {!! Form::submit('Delete', array('class'=> 'btn btn-danger btn-block')) !!}
            {!! Form::close() !!}
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


@endsection
