<div class="well">
	<h1 class="intro-title">{{ config('app.name') }}</h1>
	<p>Get video responses for your web development questions!</p>
	@if (!Auth::check())
		<div>
			<a href="/signup" class="btn btn-primary">Sign Up (It's free)</a>
			<a href="/ask" class="btn btn-primary">Ask a question</a>
		</div>
	@endif
</div>