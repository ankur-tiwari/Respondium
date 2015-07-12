<form method="post" action="/social-login">
	{!! csrf_field() !!}
	<input type="hidden" name="service" value="github">

	<div class="form-group">
		<button class="btn btn-primary btn-lg btn-block">Sign In With Github</button>
	</div>
</form>