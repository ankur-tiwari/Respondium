<ul class="list-group" id="questions-list">
	@foreach($questions as $question)
	<li class="list-group-item question-item">
		<div class="row">
			<div class="col-md-3">
				<div class="row">
					<div class="col-md-4 text-center">{{ $question->getVotes() }} <br>votes</div>
					<div class="col-md-4 text-center">{{ sizeof($question->answers) }} <br>answers</div>
					<div class="col-md-4 text-center">{{ $question->getViews() }} <br>views</div>
				</div>
			</div>
			<div class="col-md-9">
				<h4 class="list-group-item-heading">
					<a href="/questions/{{ $question->slug }}">{{ $question->title }}</a>
				</h4>
				<div>
					@foreach($question->tags as $tag)
						<a href="/tagged/{{ $tag->name }}" class="label label-primary">{{ $tag->name }}</a>
					@endforeach
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-md-offset-9">
				Asked by {{ $question->user }}. Modified <time class="timeago" datetime="{{ $question->updated_at->format('c') }}"></time>.
			</div>
		</div>
	</li>
	@endforeach
	{!! $questions->render() !!}
</ul>