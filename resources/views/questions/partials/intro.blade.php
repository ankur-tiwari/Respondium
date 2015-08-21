<div class="well">
	<h1 class="intro-title">{{ config('app.name') }}</h1>
	@if (!Auth::check())
		<div>
			<a href="/signup" class="btn btn-primary">Signup now</a>
			<a href="/ask" class="btn btn-primary">Ask a question</a>
		</div>
	@endif
</div>