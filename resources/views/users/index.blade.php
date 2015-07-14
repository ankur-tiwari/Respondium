@extends('layouts.dashboard')

@section('page_title')
	Users
@stop

@section('content')
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Full Name</th>
							<th>Email</th>
							<th>Admin</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->admin ? 'YES' : 'NO' }}</td>
								<td> <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-primary">Edit</a> <a href="/dashboard/users/{{ $user->id }}" data-method="delete" class="btn btn-danger">Delete</a> </td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@stop
