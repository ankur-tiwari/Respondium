@extends('layouts.front')

@section('content')

	<div class="row">
		<div class="col-md-9">
			@include('questions.partials.intro')
			@include('questions.forms.search')
			<ul class="list-group" id="questions-list">
				@foreach($questions as $question)
					@include('questions.partials.list')
				@endforeach
				{!! $questions->render() !!}
			</ul>
		</div>
		<div class="col-md-3"></div>
	</div>

@stop