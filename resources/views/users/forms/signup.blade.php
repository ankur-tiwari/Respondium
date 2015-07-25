<form action="/signup" method="post" name="SignUp_Form" class="form-signin">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name" required="" autofocus="" />
	</div>
	<div class="form-group">
		<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="" />
	</div>
	<div class="form-group">
		<input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required=""/>
	</div>
	<div class="form-group">
		<button class="btn btn-lg btn-primary btn-block"  name="submit" value="Sign Up" type="Submit">Sign Up</button>
	</div>
</form>
