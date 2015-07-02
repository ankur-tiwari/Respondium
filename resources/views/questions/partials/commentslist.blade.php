<div class="row" id="comments">
	@foreach($question->comments as $comment)
	<div class="comment-item">
		<div class="body">
			{{ $comment->body }} - {{ $comment->user->name }} <time class="timeago" datetime="{{ $comment->created_at }}"></time>
		</div>
	</div>
	@endforeach
</div>