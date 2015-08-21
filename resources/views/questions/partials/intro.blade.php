<div class="well">
	<h1 class="intro-title">{{ config('app.name') }}</h1>
	<p>Welcome to Respondium. A Q&A site where you can ask and answer <em>in videos</em> it is specifically made for professional and enthusiast web developers. With your help, we're working together to build a library of videos to answer every question about web development <em>in videos</em>.</p>
	@if (!Auth::check())
		<div>
			<a href="/signup" class="btn btn-primary">Sign Up (It's free)</a>
			<a href="/ask" class="btn btn-primary">Ask a question</a>
		</div>
	@endif
</div>