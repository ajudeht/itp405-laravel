@extends('layouts.app')

@section('title', 'Add Track')

@section('level-right')

@endsection

@section('content')
<form action="./post" style="max-width: 1200px;">
  <div class="columns">
    <div class="column is-one-half" style="padding-right: 3em;">

      <label class="label">Track Name</label>
    <div class="field">
    <div class="control">
      <input name="track" class="input @if ($errors->get('track')) is-danger @endif" value="{{old('track')}}" type="text" placeholder="Track Name"></input>
      @if ($errors->get('track'))
        <p class="help is-danger">{{$errors->first('track')}}</p>
      @endif
    </div>


  </div>

<div class="field is-grouped">
<div class="control is-expanded">
    <label class="label">Artist/Composer</label>
  <input name="artist" class="input @if ($errors->get('artist')) is-danger @endif" value="{{old('artist')}}" type="text" placeholder="Jane Doe">
  @if ($errors->get('artist'))
    <p class="help is-danger">{{$errors->first('artist')}}</p>
  @endif
</div>
<div class="control" style="max-width: 200px;">
  <label class="label">Album</label>
  <div class="select">
    <select name="album" class="input @if ($errors->get('album')) is-danger @endif" value="{{old('album')}}">
      @foreach($albums as $album)
          <option value="{{$album->AlbumId}}">
            {{$album->Title}}
          </option>
        @endforeach
    </select>
    @if ($errors->get('album'))
    <p class="help is-danger">{{$errors->first('album')}}</p>
    @endif
  </div>
</div>

</div>


      <labelclass="label">Price</label>
    <div class="field has-addons">
    <p class="control">
      <a class="button is-static" style="font-size: 1.5em;">
        $
      </a>
    </p>
    <p class="control is-expanded">
      <input name="price" class="input @if ($errors->get('price')) is-danger @endif" value="{{old('price')}}" type="number" placeholder="0.00" style="font-size: 1.5em;" >
    </p>
  </div>
  @if ($errors->get('price'))
    <p class="help is-danger" style="margin-top: -.5em;">{{$errors->first('price')}}</p>
  @endif
  <hr />
  <div class="field is-grouped">
    <div class="control is-expanded">
      <label class="label">Media Type</label>
      <div class="select is-fullwidth">
        <select name="mediaType" class="input @if ($errors->get('mediaType')) is-danger @endif" value="{{old('mediaType')}}">
          @foreach($mediaTypes as $mediaType)
              <option value="{{$mediaType->MediaTypeId}}">
                {{$mediaType->Name}}
              </option>
            @endforeach
        </select>
        @if ($errors->get('mediaType'))
        <p class="help is-danger">{{$errors->first('mediaType')}}</p>
        @endif
      </div>
    </div>
  <div class="control">
      <label class="label">Length (Milliseconds)</label>
    <input name="length" class="input @if ($errors->get('length')) is-danger @endif" value="{{old('length')}}" type="number" placeholder="Text input">
    @if ($errors->get('length'))
    <p class="help is-danger">{{$errors->first('length')}}</p>
    @endif
  </div>
  <div class="control">
    <label class="label">Size (Bytes)</label>
  <input name="size" class="input @if ($errors->get('size')) is-danger @endif" value="{{old('size')}}" type="number" placeholder="Text input">
  @if ($errors->get('size'))
  <p class="help is-danger">{{$errors->first('size')}}</p>
  @endif
  </div>
  </div>
    </div>

    <div class="column">
      <label class="label">Genre</label>
      <div class="field is-grouped is-grouped-multiline @if ($errors->get('genre')) is-danger @endif">

            @foreach($genres as $genre)
                <p class="control tagField"><input type="radio" name="genre" id="{{$genre->Name}}" value="{{$genre->GenreId}}" {{ old('genre')==($genre->GenreId) ? "checked" : null }}><label for="{{$genre->Name}}" class="button is-outline is-rounded">{{$genre->Name}}</label></p>
              @endforeach
      </div>
      @if ($errors->get('genre'))
      <p class="help is-danger">{{$errors->first('genre')}}</p>
      @endif
    </div>

  </div>


<hr />
<div class="field is-grouped">
  <p class="control">
    <input type="submit" value="Add Track" class="button is-success"></input>
  </p>
  <p class="control">
    <a href="/tracks" class="button is-light">
      Cancel
    </a>
  </p>
</div>
</form>

@endsection
