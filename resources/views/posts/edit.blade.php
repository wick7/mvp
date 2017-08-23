@section('title', '| Edit')

@extends('main')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xs-12 text-center">
        <h1>Edit Post</h1>
        <hr />
      </div>
  </div>
  {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT'])!!}
  <div class="row">
    <div class="col-md-8">

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

        {{ Form::label('org_name', "Organization Name:", array('style' => 'margin-top: 1em; text-decoration: underline;'))}}
        {{ Form::text('org_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}<br>

        {{ Form::label('title', 'Title of Event:', array('style' => 'text-decoration: underline;'))}}
        {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100'))}}<br>

        {{ Form::label('avatar_photo', 'Upload Post Image:', array('style' => 'text-decoration: underline'))}}
        {{Form::file('avatar_photo')}}<br>

        {{ Form::label('time_label', 'Choose Start & End Date/Time:', array('style' => 'text-decoration: underline'))}}<br>
        {{ Form::label('date_time_start', 'Begins:', array('style' => 'text-decoration: underline'))}}
        <input type="datetime-local" name="start_time" min="2000-01-02">

        {{ Form::label('date_time_end', 'Ends:', array('style' => 'text-decoration: underline'))}}
        <input type="datetime-local" name="end_time" min="2000-01-02"><br>



        {{ Form::label('location', "Location:", array('style' => 'margin-top: 1em; text-decoration: underline;'))}}
        {{ Form::text('address_city', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}

        {{ Form::label('body', "Post Body:", array('style' => 'margin-top: 1em; text-decoration: underline;'))}}
        {{ Form::textarea('description', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '5000'))}}<br />

        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=> 'btn btn-danger btn-block', 'style' => 'padding: .8em; font-size: 1.2em;' )) !!}
        {{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 1em'))}}
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
        {{-- <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=> 'btn btn-danger btn-block')) !!}
          </div>
          <div class="col-sm-6">

            {!! Form::submit('Save Changes', array('class'=> 'btn btn-success btn-block')) !!}
          </div>
        </div> --}}
      </div>
    </div>
  </div>
  {!! Form::close()!!}
</div>
<hr />


@endsection
