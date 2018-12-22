@extends('layouts.app')

@section('content')

<h1>{{ $album->name }}</h1>

<div class="content mt-1 mb-5">
  @if (count($album->photos) > 0)
    @foreach ($album->photos as $photo)
      <a class="photoTitle" href="/storage/photos/{{ $photo->album_id}}/{{ $photo->photo }}">
        <div class="album text-center">
          <img src="/storage/photos/{{ $photo->album_id}}/{{ $photo->photo }}" alt="{{ $photo->title }}">
          {{-- <br>
          <p>{{ $photo->title }}</p> --}}
        </div>
      </a>
    @endforeach
  @else
    <h4 class="text-center mt-5 display-4">Nothing to display here yet</h4>
  @endif
</div>
<hr>
<a href="/albums" class="btn btn-secondary my-4">Go Back</a>
<a href="/photos/create/{{ $album->id }}" class="btn btn-primary my-4">Upload photos</a>

@endsection
