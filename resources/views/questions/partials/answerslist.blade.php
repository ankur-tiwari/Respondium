<div class="row" id="answers">
	<div class="col-md-12">
		<hr>
		<h2>{{ sizeof($question->answers) }} Answer(s)</h2>
		@foreach($question->answers as $answer)
			<hr>
			<div>{!! $answer->description !!}</div>
			{!! $generator->generate($answer->website, $answer->video_url)->iframeCodeForBootstrap() !!}
			<hr>
		@endforeach
	</div>

</div>
