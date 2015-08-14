<div class="well">
	<h1 class="intro-title">AnswersVid</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis quasi, recusandae aspernatur quam placeat consectetur voluptatem culpa maiores, natus, debitis cupiditate vel non enim molestiae ad molestias tempora temporibus eius.</p>
	@if (!Auth::check())
	<div>
		<a href="/signup" class="btn btn-primary">Signup now</a>
		<a href="/ask" class="btn btn-primary">Ask a question</a>
	</div>
	@endif
</div>