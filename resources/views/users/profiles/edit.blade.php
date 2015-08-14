@inject('auth', 'Illuminate\Contracts\Auth\Guard');
@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-3">
			<img src="{{ gravatar($auth->user()->email, 200) }}" alt="{{$auth->user()->name}}" class="img-responsive img-circle profile-gravatar">
			<p>Want to change your profile photo? We pull from <a href="http://gravatar.com">gravatar.com</a>.</p>
		</div>
		<div class="col-md-9">
			<form action="/user/{{ $auth->user()->id }}/profile" method="post">
				{!! csrf_field() !!}
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="name" value="{{ $auth->user()->name }}" required>
				</div>
				<div class="form-group">
					<label>Bio</label>
					<textarea name="bio" class="form-control" required>{{ $auth->user()->bio }}</textarea>
				</div>

				<div class="form-group">
					<button class="btn btn-primary btn-sm">Save</button>
				</div>
			</form>
		</div>
	</div>
@stop