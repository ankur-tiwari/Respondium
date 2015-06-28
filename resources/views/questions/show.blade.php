@extends('layouts.front')

@section('content')

	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-1">
					<span class="glyphicon glyphicon-triangle-top arrow-mark"></span>
					<span class="votes">{{ $question->votes }}</span>
					<span class="glyphicon glyphicon-triangle-bottom arrow-mark"></span>
				</div>
				<div class="col-md-11">
					<h2>{{ $question->title }}</h2>
					<hr>
					<div>{!! $question->description !!}</div>
					<div>
						<a class="label label-primary">pronunciation</a>
						<a class="label label-primary">name</a>
						<a class="label label-primary">personal</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-md-offset-9 well">
					Asked {{ $question->created_at->diffForHumans() }} <br>
					{{ $question->user->name }}
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>

@stop