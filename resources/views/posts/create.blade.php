@section('title', '| Create New Post')

@extends('main')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-12 col-xs-12 text-center">
      <h1>Create New Post</h1>
      <hr />
    </div>
    </div>
  </div>
    <div class="container">
    <div class="row">
      <div class="col-md-2 col-lg-2 col-xs-2"></div>
      <div class="col-md-8 col-lg-8 col-xs-8">
      {!! Form::open(['route' => 'posts.store', 'data-parsely-validate' => '', 'enctype'=> 'multipart/form-data', 'data-toggle' => 'validator', 'class' => 'form-group']) !!}

        {{ Form::label('title', 'Title of Event:')}}
        {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100'))}}

        {{ Form::label('org_name', "Organization Name:", array('style' => 'margin-top: 1em'))}}
        {{ Form::text('org_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '25'))}}

        {{ Form::label('avatar_photo', 'Uploade Post Image:')}}
        {{Form::file('avatar_photo')}}

        
        <input type="datetime-local" name="start_time" min="2000-01-02">

         
        <input type="datetime-local" name="end_time" min="2000-01-02"><br>
        <select name="org_id">

        @foreach ($organizations as $org)
          <option value= {{$org->id}} >{{$org->org_name}}</option>
        @endforeach

        </select>

        {{ Form::label('location', "Location:", array('style' => 'margin-top: 1em'))}}
        {{ Form::text('address_city', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '25'))}}

        {{ Form::label('body', "Post Body:", array('style' => 'margin-top: 1em'))}}
        {{ Form::textarea('description', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '955'))}}

        {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 1em'))}}
      {!! Form::close() !!}
    </div>
    <div class="col-md-2 col-lg-2 col-xs-2"></div>
  </div>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
</div>


@endsection

@section('scripts')
  {!! Html::script('js/parsely.min.js')!!}

@endsection
