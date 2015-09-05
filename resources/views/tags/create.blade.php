@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h1 class="page-header">Create a New Tag</h1>

			<form action="/tags" method="post">
				{!! csrf_field() !!}
				<div class="form-group">
					<label for="Label">Label:</label>
					<input type="text" id="Label" name="name" class="form-control">
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Create</button>
				</div>
			</form>
		</div>
	</div>
@stop