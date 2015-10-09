@if ( isset($title) )
	<title>{{ $title }} - {{ config('app.name') }}</title>
@elseif ( isset($question) and Request::path() !== '/' )
	<title>{{ $question->title }} - {{ config('app.name') }}</title>
@else
	<title>{{ config('app.name') }}</title>
@endif
