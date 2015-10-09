<h3>All Tags</h3>
@foreach($tags as $tag)
	<a href="/tagged/{{ $tag }}" class="btn btn-default">{{ $tag }}</a>
@endforeach
