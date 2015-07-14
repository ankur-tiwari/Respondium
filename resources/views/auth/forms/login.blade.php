<form method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	@include('partials.errors')

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
