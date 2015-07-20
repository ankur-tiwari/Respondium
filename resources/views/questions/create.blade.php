@extends('layouts.front')

@section('content')

	<div class="row">
		<div class="col-md-9">
			<h3>Ask a question</h3>
			@include('questions.forms.ask')
		</div>
		<div class="col-md-3"></div>
	</div>

@stop