@extends('layouts.front')

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
					<textarea name="description" class="form-control" cols="30" rows="7" required=""></textarea>
				</div>

				<div class="form-group">
					<input type="submit" value="Ask" class="btn btn-primary">
				</div>

			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
@stop