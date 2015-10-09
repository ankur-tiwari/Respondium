@inject('auth', 'Illuminate\Contracts\Auth\Guard')
@inject('videoGenerator', 'App\HtmlGenerators\AnswerVideo')

<div class="row single-question" itemscope itemtype="http://schema.org/Question">
	<div class="col-md-12">
		<h1 class="page-header" itemprop="name">{{ $question->title }}</h1>
		<p itemprop="text">{!! Markdown::parse($question->description); !!}</p>
		@if($question->video_url)
			{!! $videoGenerator->generate($question->video_url) !!}
		@endif

		<div class="question-tags">
			@foreach($question->tags as $tag)
				<a href="/tagged/{{ $tag->name }}" class="label label-default">{{ $tag->name }}</a>
			@endforeach
		</div>

		<div class="links-bar">
			@if ($auth->check())
				@if ($auth->user()->id === $question->user->id)
					<a class="btn btn-primary btn-sm" href="/questions/{{ $question->slug }}/edit">Edit</a>
					<form method="post" action="/questions/{{ $question->slug }}" class="inline">
						{!! csrf_field() !!}
						<input type="hidden" name="_method" value="DELETE">

						<button class="btn btn-danger btn-sm" href="/questions/{{ $question->slug }}/delete">Delete</button>
					</form>
				@endif
			@endif
		</div>
	</div>
</div>
