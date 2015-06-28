@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		    <h3 class="form-signin-heading">Please Sign In</h3>

			<form method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				@include('partials.errors')
				@include('partials.flash')

				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
				</div>

				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" required=""/>
				</div>

				<div class="form-group">
					<button class="btn btn-lg btn-primary btn-block"  name="submit" value="Login" type="Submit">Sign In</button>
				</div>
			</form>
		</div>
	</div>
@stop