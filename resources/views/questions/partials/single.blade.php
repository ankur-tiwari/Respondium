<div class="row single-question">
	<div class="col-md-12">
		<h1 class="page-header">{{ $question->title }}</h1>
		<p>{!! Markdown::parse($question->description); !!}</p>
		<div class="links-bar">
			<a href="/questions/{{ $question->slug }}/edit">Edit</a>
		</div>
	</div>
</div>
