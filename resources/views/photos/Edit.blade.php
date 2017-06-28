@section('title', '| Edit')

<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css')}}">

@extends('main')
@section('content')

<div class="container">
  {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT'])!!}
  <div class="row">
    <div class="col-md-8">

      {{ Form::text('title', null, ['class' => 'form-control']) }}
      {{ Form::textarea('body', null, ['class' => 'form-control']) }}
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
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=> 'btn btn-danger btn-block')) !!}
          </div>
          <div class="col-sm-6">

            {!! Form::submit('Save Changes', array('class'=> 'btn btn-success btn-block')) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close()!!}
</div>
<hr />


@endsection
