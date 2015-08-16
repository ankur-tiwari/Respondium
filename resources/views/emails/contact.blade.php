@extends('emails.layouts.basic')

@section('heading')
	{{ $subject }}
@stop

@section('content')
	Sir, the email came from somebody named {{ $name }}. He/She wrote: <br>
	{{ $bodyMessage }} <br>
	His/Her email address was {{ $email }}
@stop