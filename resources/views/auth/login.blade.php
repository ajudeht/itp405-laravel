@extends('layouts.app', ['customHeader' => true])

@section('content')
<div class="columns">
  <div class="column is-one-third" style="padding-right: 3em;">
    <div class="box form-box">

      <section class="login-header"></section>

    <form method="POST" action="{{ route('login') }}">
  <h1 class="subtitle is-3">Log In</h1>
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
            <label class="label">Password</label>
              <input id="password" name="password" type="password" class="input is-expanded @if ($errors->get('password')) is-danger @endif" placeholder="password" value="{{old('password')}}">
              @if ($errors->get('password'))
              <p class="help is-danger">{{$errors->first('password')}}</p>
              @endif
          </div>
        </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>



                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                <!-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif -->

    </form>
  </div>
  </div>
    <div class="column" style=""></div>
</div>


@endsection
