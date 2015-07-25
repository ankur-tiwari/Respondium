<form method="post" action="/social-login">
	{!! csrf_field() !!}
	<input type="hidden" name="service" value="facebook">

	<div class="form-group">
		<button class="btn btn-block btn-social btn-lg btn-facebook">
			<i class="fa fa-facebook"></i>
			Sign in with facebook
		</button>
	</div>
</form>