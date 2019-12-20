@extends('layouts.app', ['customHeader' => true])

@section('title', 'Edit Genre')

@section('level-right')

@endsection

@section('content')
<h1 class="subtitle is-3">Edit Genre</h1>
<div class="box form-box">

<section class="login-header narrow"></section>
<form action="./post" >

      <input name="id" type="hidden" value="{{$genre->GenreId}}"/>
      <label class="label">Genre Name</label>
    <div class="field">
    <div class="control">
      <input name="name" class="input @if ($errors->get('name')) is-danger @endif" value="{{old('name')}}" type="text" placeholder="{{$genre->Name}}" style="font-size: 2em;"></input>
      @if ($errors->get('name'))
        <p class="help is-danger">{{$errors->first('name')}}</p>
      @endif
    </div>
  </div>
  <hr />
  <div class="field is-grouped">
    <p class="control">
      <input type="submit" value="Save Changes" class="button is-success"></input>
    </p>
    <p class="control">
      <a href="/genres" class="button is-light">
        Cancel
      </a>
    </p>
  </div>


</form>
</div>

@endsection
