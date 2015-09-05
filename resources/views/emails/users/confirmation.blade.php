@extends('emails.layouts.basic')

@section('heading')
	Welcome to our site!
@stop

@section('content')
	Thank you very much for registering. Please click at the link below to activate your account. If you have any questions feel free to ask them via <a href="{{ url('/contact-us') }}">our contact form</a>
	<br>
	<strong><a href="{{ url('/email/confirm/' + $code) }}">{{ $code }}</a></strong>
@stop
