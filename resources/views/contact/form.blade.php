@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h1>Contact Us</h1>
			<hr>
			<form method="post">
				{!! csrf_field() !!}
				<div class="form-group">
					<label>Email </label>
					<input type="email" name="email" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Subject</label>
					<input type="text" name="subject" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Message</label>
					<textarea name="message" class="form-control" required></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary"> Submit </button>
				</div>
			</form>
		</div>
	</div>
@stop