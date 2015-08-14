@inject('auth', 'Illuminate\Contracts\Auth\Guard')

<div class="row single-question">
	<div class="col-md-12">
		<h1 class="page-header">{{ $question->title }}</h1>
		<p>{!! Markdown::parse($question->description); !!}</p>
		<div class="links-bar">
			@if ($auth->check())
				@if ($auth->user()->id === $question->user->id)
					<a class="btn btn-primary btn-sm" href="/questions/{{ $question->slug }}/edit">Edit</a>
				@endif
			@endif
		</div>
	</div>
</div>
