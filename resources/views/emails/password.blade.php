@extends('emails.layouts.basic')

@section('heading')
	Reset Your Password
@stop

@section('content')
	Hello! We recieved a password reset request from you.
	<br>
	<strong>Click here to reset your password: {{ url('password/reset/'.$token) }}</strong>
	<br>
	If you didn't send it, don't worry, just ignore this email.
@stop
