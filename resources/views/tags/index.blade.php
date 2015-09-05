@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h1 class="page-header">All Tags</h1>
			<div class="list-group">
				@foreach($tags as $tag)
					<a href="#" class="list-group-item">{{ $tag->name }}</a>
				@endforeach

			</div>
		</div>
	</div>
@stop