@extends('emails.layouts.basic')

@section('content')
	<p>Sir somebody sent an email from the contact form on respondium.</p>
	<p><strong>Name:</strong> {{$name}}</p>
	<p><strong>Email:</strong> {{$email}}</p>
	<p><strong>Subject:</strong> {{$subject}}</p>
	<p><strong>Message:</strong> {{$bodyMessage}}</p>
@stop
