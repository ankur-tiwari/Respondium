@extends('layouts.front')

@section('content')
	@include('partials.flash')

	<div class="row">
		<div class="col-md-9">

			<ul class="list-group">
				@foreach($questions as $question)
				<li class="list-group-item question-item">
					<div class="row">
						<div class="col-md-3">
							<div class="row">
								<div class="col-md-4 text-center">{{ $question->votes }} <br>votes</div>
								<div class="col-md-4 text-center">{{ $question->answers }} <br>answers</div>
								<div class="col-md-4 text-center">{{ $question->views }} <br>views</div>
							</div>
						</div>
						<div class="col-md-9">
							<h4 class="list-group-item-heading">
								<a href="/questions/{{ $question->slug }}">{{ $question->title }}</a>
							</h4>
							<p>
								<a class="label label-primary">pronunciation</a>
								<a class="label label-primary">name</a>
								<a class="label label-primary">personal</a>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-md-offset-9">
							Asked by {{ $question->user->name }}. Modified <time class="timeago" datetime="{{ $question->updated_at->format('c') }}"></time>.
						</div>
					</div>
				</li>
				@endforeach
				{!! $questions->render() !!}
			</ul>

		</div>
		<div class="col-md-3"></div>
	</div>
@stop