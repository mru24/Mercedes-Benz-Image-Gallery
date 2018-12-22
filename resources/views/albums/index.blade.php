@extends('layouts.app')

@section('content')

  <div class="content mt-1 mb-5">
    @if (count($albums) > 0)
      @foreach ($albums as $album)
        <a class="photoTitle" href="/albums/{{ $album->id }}">
          <div class="album text-center">
            <img src="storage/album_covers/{{ $album->cover_image }}" alt="">
            <br>
            <p>{{ $album->name }}</p>
          </div>
        </a>
      @endforeach
    @else
      <h4 class="text-center mt-5 display-4">Nothing to show here yet</h4>
    @endif
  </div>

  <a href="/albums/create" class="btn btn-primary mt-5">Create Album</a>

@endsection

@section('sidebar')
  @parent
  <h5 class="my-3">Chapters:</h5>
  @foreach ($albums as $album)
    <a href="/albums/{{ $album->id }}" class="d-block">{{ $album->name }}</a>
  @endforeach

@endsection
