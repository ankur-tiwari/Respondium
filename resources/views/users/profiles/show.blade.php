@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-3">
			<img src="{{ gravatar($user->email, 200) }}" alt="{{$user->name}}" class="img-responsive img-circle profile-gravatar">
			<div class="text-center">
				<a class="btn btn-primary btn-sm profile-edit-button" href="/profile/edit">Edit your profile</a>
			</div>
		</div>
		<div class="col-md-9">
			<h1 class="page-header">{{ $user->name }}</h1>
			<p>{{ $user->bio }}</p>
		</div>
	</div>
@stop