<form method="post" action="/social-login">
	{!! csrf_field() !!}
	<input type="hidden" name="service" value="google">

	<div class="form-group">
		<button class="btn btn-primary btn-lg btn-block">Sign In With Google</button>
	</div>
</form>