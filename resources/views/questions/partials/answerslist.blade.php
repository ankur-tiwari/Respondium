@inject('videoGenerator', 'App\HtmlGenerators\AnswerVideo')
@inject('auth', 'Illuminate\Contracts\Auth\Guard')
<div class="row" id="answers">
	<div class="col-md-12">
		<hr>
		<h2>{{ sizeof($question->answers) }} Answer(s)</h2>
		@foreach($question->answers as $answer)
			<hr>
			<div class="row">
				<div class="col-md-12">
					<article class="lead">{!! $answer->description !!}</article>
					{{-- TODO: Change the messy generator class. It's all messed up. --}}
					{!! $videoGenerator->generate($answer->video_url) !!}
					<br>
					@if ($auth->user()->id === $answer->user_id)
					<div class="links-bar">
						<form method="post" action="/answers/{{ $answer->id }}" class="inline">
							{!! csrf_field() !!}
							<input type="hidden" name="_method" value="DELETE">

							<button class="btn btn-danger btn-sm">Delete</button>
						</form>
					</div>
					@endif
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
		@endforeach
	</div>

</div>
