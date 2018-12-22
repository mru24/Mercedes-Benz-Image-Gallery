@extends('layouts.app')

@section('content')

  <h2 class="text-center">Upload Photo</h2>
  {!! Form::open(['action' => 'PhotoController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'my-4 border p-4']) !!}
    <div class="form-group">
      {{Form::file('photo', ['class' => 'btn btn-default text-light mt-2'])}}
    </div>
    <div class="form-group">
      {{Form::label('title', 'Photo Title')}}
      {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Photo Title'])}}
    </div>
    <div class="form-group">
      {{Form::label('description', 'Photo Description')}}
      {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Photo Description'])}}
    </div>    
    {{Form::hidden('album_id', $album_id)}}
    {{Form::submit('Submit', ['class' => 'btn btn-success my-4 d-block mx-auto'])}}
  {!! Form::close() !!}

@endsection

@section('sidebar')
  @parent
  <h5 class="my-3">Years</h5>

@endsection
