@inject('videoGenerator', 'App\HtmlGenerators\AnswerVideo')
<div class="row" id="answers">
	<div class="col-md-12">
		<hr>
		<h2>{{ sizeof($question->answers) }} Answer(s)</h2>
		@foreach($question->answers as $answer)
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div>{!! $answer->description !!}</div>
					<hr>
					{!! $videoGenerator->generate($answer->video_url) !!}
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-6">
					<div class="well">
						Answered <time class="timeago" datetime="{{ $answer->created_at->format('c') }}"></time> <br>
						{{ $answer->user->name }}
					</div>
				</div>
			</div>
			@include('questions.forms.answercomment')
			@include('questions.partials.answerscommentslist')
		@endforeach
	</div>

</div>
