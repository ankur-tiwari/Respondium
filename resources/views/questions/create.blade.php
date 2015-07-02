@extends('layouts.front')

@section('header')
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="/editor/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
	<link href="/editor/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@stop

@section('content')

	<div class="row">
		<div class="col-md-9">
			<h3>Ask a question</h3>
			@include('partials.errors')
			@include('questions.forms.ask')
		</div>
		<div class="col-md-3"></div>
	</div>

@stop