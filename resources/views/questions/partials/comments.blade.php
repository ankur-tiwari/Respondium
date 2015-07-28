<div id="comments">
	@if(Auth::check())
		<div class="row">
			<div class="col-md-12">
				<form id="comment_form" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="post_id" value="{{ $question->id }}">
					<div class="form-group">
						<textarea placeholder="Write a comment" name="body" id="comment_body" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	@endif

	<div id="comments_list" class="row comments">
		@foreach($question->comments as $comment)
		<div class="col-md-12 comment-item">
			<div class="body">
				{{ $comment->body }} - {{ $comment->user->name }} <time class="timeago" datetime="{{ $comment->created_at }}"></time>
			</div>
		</div>
		@endforeach
	</div>
</div>
