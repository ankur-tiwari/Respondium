<div class="row">
	<div class="col-md-12">
		<h2>{{ $question->title }}</h2>
		<hr>
		<div>{!! $question->description !!}</div>
		<div>
			@foreach($question->tags as $tag)
				<a href="/tagged/{{ $tag->name }}" class="label label-primary">{{ $tag->name }}</a>
			@endforeach
		</div>
		<hr>
	</div>
</div>
