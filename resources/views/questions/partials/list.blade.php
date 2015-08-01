<ul class="list-group" id="questions-list">
	@foreach($questions as $question)
	<li class="list-group-item question-item">
		<div class="row">
			<div class="col-md-12">
				<h4 class="list-group-item-heading" style="font-weight: bold">
					<a href="/questions/{{ $question->slug }}">{{ $question->title }}</a>
				</h4>
				<p>{{ str_limit($question->description, 400) }}</p>
			</div>
			<div class="col-md-12 single-question-buttons">
				<a href="" class="btn btn-primary btn-sm upvote">Upvote</a>
				<a href="" class="btn btn-default btn-sm downvote">Downvote</a>
				<a href="" class="btn btn-success btn-sm">Share</a>
			</div>
		</div>
	</li>
	@endforeach
	{!! $questions->render() !!}
</ul>