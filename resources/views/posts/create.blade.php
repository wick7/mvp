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

        <!--- THIS ISNT GOING ANYWHERE. NEED TO CHANGE POSTS TABLE---->
        {{-- {{ Form::label('Choose From Saved Organizations or Enter in Next Field:')}}<br>
        <select name="org_id">
        @foreach ($organizations as $org)
          <option value= {{$org->id}} >{{$org->org_name}}</option>
        @endforeach
        </select><br> --}}

        {{ Form::label('org_site', "Organization Site Link:", array('style' => 'margin-top: 1em'))}}
        {{ Form::text('org_site', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}<br>

        {{ Form::label('org_name', "Organization Name:", array('style' => 'margin-top: 1em'))}}
        {{ Form::text('org_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}<br>


        {{ Form::label('title', 'Title of Event:')}}
        {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100'))}}<br>

        {{ Form::label('slug', 'Slug Tag:')}}
        {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '100'))}}<br>


        {{ Form::label('avatar_photo', 'Upload Post Image:',array('style' => 'text-decoration: underline'))}}
        {{Form::file('avatar_photo')}}<br>
        {{ Form::label('Choose Start & End Date/Time:')}}<br>
        {{ Form::label('start', 'Begins:')}}

        <input type="datetime-local" name="start" min="2000-01-02">
        {{ Form::label('end', 'Ends:')}}
        <input type="datetime-local" name="end" min="2000-01-02"><br>
        {{ Form::label('location', "Location:", array('style' => 'margin-top: 1em'))}}
        {{ Form::text('address_city', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}

        {{ Form::label('body', "Post Body:", array('style' => 'margin-top: 1em'))}}
        {{ Form::textarea('description', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '5000'))}}

        {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 1em'))}}
        <a href="{{ url('posts') }}"><div style='margin-top: 1em' class="btn btn-danger btn-lg btn-block">CANCEL</div></a>
      {!! Form::close() !!}

       {{-- <a href="{{route('org')}}" class="btn btn-success">Create New Organization</a> --}}
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
