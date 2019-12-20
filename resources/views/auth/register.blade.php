@extends('layouts.app', ['customHeader' => true])

@section('content')
<div class="columns">
  <div class="column is-one-third" style="padding-right: 3em;">
    <div class="box form-box">

      <section class="login-header"></section>
  <form method="POST" action="{{ route('register') }}">
      <h1 class="subtitle is-3">Sign Up</h1>
      @csrf
                <div class="field">
            <div class="control is-fullwidth">
              <label class="label">Email Address</label>
                <input name="email" type="email" class="input is-expanded @if ($errors->get('email')) is-danger @endif" placeholder="example@email.com" value="{{old('email')}}">
                @if ($errors->get('email'))
                <p class="help is-danger">{{$errors->first('email')}}</p>
                @endif
            </div>
        </div>
        <div class="field">
            <div class="control is-fullwidth">
              <label class="label">Name</label>
                <input name="name" type="text" class="input is-expanded @if ($errors->get('name')) is-danger @endif" placeholder="Name" value="{{old('name')}}">
                @if ($errors->get('name'))
                <p class="help is-danger">{{$errors->first('name')}}</p>
                @endif
            </div>
        </div>
                <div class="field">
            <div class="control is-fullwidth">
              <label class="label">Password</label>
                <input id="password" name="password" type="password" class="input is-expanded @if ($errors->get('password')) is-danger @endif" placeholder="password" value="{{old('password')}}">
                @if ($errors->get('password'))
                <p class="help is-danger">{{$errors->first('password')}}</p>
                @endif
            </div>
        </div>


        <div class="field">
    <div class="control is-fullwidth">
      <label class="label">Confirm Password</label>
        <input id="password" name="password_confirmation" type="password" class="input is-expanded @if ($errors->get('password_confirmation')) is-danger @endif" placeholder="password" value="{{old('password_confirmation')}}">
        @if ($errors->get('password_confirmation'))
        <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
        @endif
    </div>
</div>


              <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
              </button>

  </form>
</div>
</div>
  <div class="column" style=""></div>
</div>
@endsection
