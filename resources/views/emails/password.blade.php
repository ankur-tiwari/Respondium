@extends('emails.layouts.basic')

@section('content')
	Hello! We recieved a password reset request from you.
	<br>
	<strong><a href="{{ url('password/reset/'.$token) }}">Click here</a> to reset your password.</strong>
	<br>
	If you didn't send it, don't worry, just ignore this email.
@stop
