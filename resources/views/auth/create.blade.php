@extends('layouts.front')

@section('content')
	<div class="wrapper">
		<form action="" method="post" name="Login_Form" class="form-signin">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>

			<hr class="colorgraph"><br>
			@include('partials.errors')
			@include('partials.flash')

			<input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
			<input type="password" class="form-control" name="password" placeholder="Password" required=""/>

			<button class="btn btn-lg btn-primary btn-block"  name="submit" value="Login" type="Submit">Login</button>
		</form>
	</div>
@stop