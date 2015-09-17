@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-9">
			@include('questions.forms.search')
			<ul class="list-group">
				@foreach($questions as $question)
					@include('questions.partials.list')
				@endforeach
				{!! $questions->render() !!}
			</ul>
		</div>
		<div class="col-md-3 sidebar-tags">
			@include('layouts.partials.sidebar.tags')
		</div>
	</div>
@stop