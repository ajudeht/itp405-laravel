@extends('layouts.app')

@section('title', 'Genres')

@section('level-right')
@endsection

@section('content')
<div class="tags are-medium">
@foreach ($genres as $genre)
    <div class="tags genre-array has-addons">
      <a href="/tracks?genre={{$genre->Name}}" class="tag is-rounded is-medium is-black">{{$genre->Name}}</a>
      <a href="/genres/{{$genre->GenreId}}/edit" class="tag is-rounded is-medium is-info"><i class="material-icons" style="font-size: 1em; margin-left: -.2em;">edit</i></a>
  </div>
@endforeach
</div>
@endsection
