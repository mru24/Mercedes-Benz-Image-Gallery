@extends('layouts.app')

@section('content')

  <h2 class="text-center">Create Album</h2>
  {!! Form::open(['action' => 'AlbumController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'my-4 border p-4']) !!}
    <div class="form-group">
      {{Form::label('name', 'Album Name')}}
      {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Album Name'])}}
    </div>
    <div class="form-group">
      {{Form::label('description', 'Album Description')}}
      {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Album Description'])}}
    </div>
    <div class="form-group">
      {{Form::file('cover_image', ['class' => 'btn btn-default text-light mt-2'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-success my-4 d-block mx-auto'])}}
  {!! Form::close() !!}

@endsection

@section('sidebar')
  @parent
  <h5 class="my-3">Years</h5>

@endsection
