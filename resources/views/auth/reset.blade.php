@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>Reset your password</h1>
			<hr>
			<form method="POST" action="/password/reset">
			    {!! csrf_field() !!}
			    <input type="hidden" name="token" value="{{ $token }}">

			    <div class="form-group">
			    	<label>Email</label>
			        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
			    </div>

			    <div class="form-group">
			    	<label>Password</label>
			        <input type="password" name="password" class="form-control">
			    </div>

			    <div class="form-group">
			    	<label>Confirm Password</label>
			        <input type="password" name="password_confirmation" class="form-control">
			    </div>

			    <div>
			        <button type="submit" class="btn btn-primary btn-lg btn-block">Reset Password</button>
			    </div>
			</form>
		</div>
	</div>
@stop