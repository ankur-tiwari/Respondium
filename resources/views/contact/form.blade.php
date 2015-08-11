@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h1 class="page-header">Contact Us</h1>
			<form method="post">
				{!! csrf_field() !!}
				<div class="form-group">
					<label>Email </label>
					<input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
				</div>

				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
				</div>

				<div class="form-group">
					<label>Subject</label>
					<input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
				</div>

				<div class="form-group">
					<label>Message</label>
					<textarea name="message" class="form-control" required>{{ old('message') }}</textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary"> Submit </button>
				</div>
			</form>
		</div>
	</div>
@stop