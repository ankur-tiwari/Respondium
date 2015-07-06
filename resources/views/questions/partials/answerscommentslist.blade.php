<div class="row comments">
	@foreach($answer->comments as $comment)	
	<div class="col-md-12 comment-item">
		<div class="body">
			{{ $comment->body }} - {{ $comment->user->name }} <time class="timeago" datetime="{{ $comment->created_at }}"></time>
		</div>
	</div>
	@endforeach
</div>