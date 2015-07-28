<div id="comments" v-el="comments" data-post="{{$question->id}}">
	@if(Auth::check())
		<div class="row">
			<div class="col-md-12">
				<form v-on="submit: addComment" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<input v-model="newComment" type="text" class="form-control" placeholder="Write a comment">
					</div>
				</form>
			</div>
		</div>
	@endif

	<div id="comments_list" class="row comments">

		<div class="col-md-12 comment-item" v-repeat="comment in comments">
			<div class="body">
				@{{ comment.body }} - @{{ comment.user.name }} <time class="timeago" datetime="@{{ comment.created_at }}">@{{ comment.created_at }}</time>
			</div>
		</div>
	</div>
</div>
