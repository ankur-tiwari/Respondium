@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		    <h3 class="form-signin-heading">Please Sign Up</h3>
		    @include('users.forms.signup')
		</div>
	</div>

@stop