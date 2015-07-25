<form method="post" action="/social-login">
	{!! csrf_field() !!}
	<input type="hidden" name="service" value="github">

	<div class="form-group">
		<button class="btn btn-block btn-social btn-lg btn-github">
			<i class="fa fa-github"></i>
			Sign in with github.
		</button>
	</div>
</form>