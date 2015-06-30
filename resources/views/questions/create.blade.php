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
			<form method="post">

				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="title" required="">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea id="description_editor" name="description" class="form-control" cols="30" rows="7" required=""></textarea>
				</div>

				<div class="form-group">
					<input type="submit" value="Ask" class="btn btn-primary">
				</div>

			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
@stop