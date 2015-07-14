@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		    <h3 class="form-signin-heading">Please Sign Up</h3>
			<form action="/signup" method="post" name="SignUp_Form" class="form-signin">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				@include('partials.errors')
				<div class="form-group">
					<input type="text" class="form-control" name="name" placeholder="Full Name" required="" autofocus="" />
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email" required="" />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" required=""/>
				</div>
				<div class="form-group">
					<button class="btn btn-lg btn-primary btn-block"  name="submit" value="Sign Up" type="Submit">Sign Up</button>
				</div>
			</form>
		</div>
	</div>

@stop