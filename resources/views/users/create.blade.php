@extends('layouts.front')

@section('content')
	<div class="wrapper">
		<form action="/signup" method="post" name="SignUp_Form" class="form-signin">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    <h3 class="form-signin-heading">Sign Up</h3>

			<hr class="colorgraph"><br>
			@include('partials.errors')
			@include('partials.flash')

			<input type="text" class="form-control" name="name" placeholder="Full Name" required="" />
			<input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
			<input type="password" class="form-control" name="password" placeholder="Password" required=""/>

			<button class="btn btn-lg btn-primary btn-block"  name="submit" value="Sign Up" type="Submit">Login</button>
		</form>
	</div>

@stop