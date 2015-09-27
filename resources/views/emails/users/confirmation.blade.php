@extends('emails.layouts.basic-with-contact-button')

@section('content')
	Thank you very much for registering.
	<strong>
		<a href="{{ Request::root() }}/email/confirm/{{$code}}">Confirm Your Email</a>
	</strong>.
	If you have something to ask, suggest or share, feel free to contact us. We would absolutely love to help and assist you.
@stop
