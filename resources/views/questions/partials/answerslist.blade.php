<div class="row" id="answers">
	<div class="col-md-12">
		<hr>
		<h2>{{ sizeof($question->answers) }} Answer(s)</h2>
		@foreach($question->answers as $answer)
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div>{!! $answer->description !!}</div>
					{!! $generator->generate($answer->website, $answer->video_url)->iframeCodeForBootstrap() !!}
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
		@endforeach
	</div>

</div>
