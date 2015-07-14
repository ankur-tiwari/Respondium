@extends('layouts.dashboard')

@section('page_title')
	Users
@stop

@section('content')
	<div class="panel panel-default">
		<div class="panel-body">
			<form action="/dashboard/users/{{ $user->id }}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" value="PUT">
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
				</div>

				<div class="form-group">
					<label>Name</label>
					<input type="name" class="form-control" name="name" value="{{ $user->name }}" required>
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
@stop