<form method="post" action="/social-login">
	{!! csrf_field() !!}
	<input type="hidden" name="service" value="google">

	<div class="form-group">
		<button class="btn btn-block btn-social btn-lg btn-google">
			<i class="fa fa-google"></i>
			Sign in with google
		</button>
	</div>
</form>