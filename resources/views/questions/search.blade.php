@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h3>Search results</h3>
			<hr>
			<ul class="list-group">
				@foreach($results as $question)
					@include('questions.partials.list')
				@endforeach
				{!! $results->render() !!}
			</ul>
		</div>
	</div>
@stop