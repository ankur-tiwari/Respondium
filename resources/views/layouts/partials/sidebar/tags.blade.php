<h2>All Tags</h2>
@foreach($tags as $tag)
	<a href="/tagged/{{ $tag }}" class="btn btn-default">{{ $tag }}</a>
@endforeach
