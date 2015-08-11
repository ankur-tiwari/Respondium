@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		    <h1 class="page-header">Please Sign In</h1>
		    @include('auth.forms.signin')
		    <hr>
		    @include('auth.forms.social.google')
		    @include('auth.forms.social.facebook')
		    @include('auth.forms.social.github')
		    @include('auth.forms.social.linkedin')
		</div>
	</div>
@stop