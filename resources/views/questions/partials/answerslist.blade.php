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
					<div align="center" class="embed-responsive embed-responsive-16by9">
					    <video class="embed-responsive-item" controls="">
					        <source src="{{ $answer->video_url }}" type="video/mp4">
					    </video>
					</div>
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
