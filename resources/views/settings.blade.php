@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="box form-box">

<section class="login-header narrow"></section>
<form action="./settings/post" >

    <div class="field">
    <div class="control level" style="border: 2px solid #f0f0f0; padding: 1em; border-radius: 3px; max-width: 400px;">
      <label class="label" style="margin-bottom: 0;">Enable Maintenance Mode</label>
      <div class="toggle">
        <input name="mmIsActive" id="mmIsActive" type="checkbox" class="check" @if($mmIsActive) checked @endif>
        <b class="b switch"></b>
        <b class="b track"></b>
      </div>
    </div>
  </div>

  <hr />
  <div class="field is-grouped">
    <p class="control">
      <input type="submit" value="Save Changes" class="button is-success"></input>
    </p>
    <p class="control">
      <a href="/home" class="button is-light">
        Cancel
      </a>
    </p>
  </div>


</form>
</div>
@endsection
