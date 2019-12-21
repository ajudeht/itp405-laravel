@extends('layouts.app', ['customHeader' => true])

@section('title', 'Docs')

@section('level-right')

@endsection

@section('content')
<h3 class="subtitle is-3">Document Edit</h3>
<form>
<div id="docs-test" contenteditable="true" wrap="hard"  style="white-space: pre-wrap; height: 600px; padding: 1em; border: 1px solid silver;"></div>
</form>

<script src="{{asset('/js/diff.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/app.js')}}" type="text/javascript"></script>
@endsection
