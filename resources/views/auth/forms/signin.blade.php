<form method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="" autofocus="" />
	</div>

	<div class="form-group">
		<input type="password" class="form-control" name="password" placeholder="Password" required=""/>
	</div>

	<div class="form-group">
		<a href="/password/email">Forgot your password?</a>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign In">
	</div>
</form>
