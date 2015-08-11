@if ( isset($question) and Request::path() !== '/' )
	<title>{{ $question->title }} - AnswersVid</title>
@elseif ( isset($title) )
	<title>AnswersVid - {{ $title }}</title>
@else
	<title>AnswersVid</title>
@endif
