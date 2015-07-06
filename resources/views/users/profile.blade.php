@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h2>Questions</h2>
			<hr>
			<div class="list-group">
				@foreach($user->posts as $post)
					<a href="/questions/{{ $post->slug }}" class="list-group-item">{{ $post->title }}</a>
				@endforeach
			</div>
		</div>
		<div class="col-md-6">
			<h2>Answers</h2>
			<hr>
			<div class="list-group">
				@foreach($user->answers as $answer)
					<a href="/questions/{{ $answer->slug }}" class="list-group-item">Your answer to the question: {{ $answer->post->title }}</a>
				@endforeach
			</div>
		</div>
	</div>
@stop
