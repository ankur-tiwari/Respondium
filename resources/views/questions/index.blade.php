@extends('layouts.front')

@section('content')

	<div class="row">
		<div class="col-md-9">
			@include('questions.forms.search')
			@include('questions.partials.list')
		</div>
		<div class="col-md-3"></div>
	</div>

@stop