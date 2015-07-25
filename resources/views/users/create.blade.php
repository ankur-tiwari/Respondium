@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		    <h3 class="form-signin-heading">Please Sign Up</h3>
		    @include('users.forms.signup')
		   <hr>
		    @include('auth.forms.social.google')
		    @include('auth.forms.social.facebook')
		    @include('auth.forms.social.github')
		    @include('auth.forms.social.linkedin')
		</div>
	</div>

@stop