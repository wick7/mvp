@section('title', '| Edit')

<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css')}}">

@extends('main')
@section('content')

<div class="container">
  {!! Form::model($Organization, ['route' => ['organizations', $Organization->id], 'method' => 'PUT', 'enctype'=> 'multipart/form-data'])!!}
  <div class="row">
    <div class="col-md-8">

      {{ Form::text('org_name', null, ['class' => 'form-control']) }}
      {{ Form::textarea('about', null, ['class' => 'form-control']) }}
      {{ Form::label('organization_image', 'Uploade Photo:')}}
      {{ Form::file('organization_image') }}
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Create At:</dt>
          <dd>{{date('M dS, Y', strtotime($Organization->created_at))}}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{date('M dS, Y', strtotime($Organization->updated_at))}}</dd>
        </dl>
        <div class="row">
          <div class="col-sm-6">
           
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
