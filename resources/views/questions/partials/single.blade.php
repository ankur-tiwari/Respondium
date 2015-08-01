<div class="row single-question">
	<div class="col-md-12">
		<h2 class="single-question-title">{{ $question->title }}</h2>
		<p>{!! $question->description !!}</p>
	</div>
	<div class="col-md-12 single-question-buttons">
		<a href="" class="btn btn-primary btn-sm upvote">Upvote</a>
		<a href="" class="btn btn-default btn-sm downvote">Downvote</a>
		<a href="" class="btn btn-success btn-sm">Share</a>
	</div>
</div>
