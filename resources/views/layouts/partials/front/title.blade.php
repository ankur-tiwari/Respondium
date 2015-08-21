@if ( isset($question) and Request::path() !== '/' )
	<title>{{ $question->title }} - AnswersVid</title>
@elseif ( isset($title) )
	<title>{{ config('app.name') }} - {{ $title }}</title>
@else
	<title>{{ config('app.name') }}</title>
@endif
