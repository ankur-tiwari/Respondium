@extends('layouts.front')

@section('content')

	<div class="row">
		<div class="col-md-9">
			<h1 class="page-header">Ask a question</h1>
			@include('questions.forms.ask')
		</div>
		<div class="col-md-3"></div>
	</div>

@stop