@if(\Auth::check())
	<div class="row answer_comment" v-el="answer" data-answer="{{ $answer->id }}">
		<form>
			<div class="form-group">
				<textarea v-on="keyup: addComment | key 'enter'" v-model="newComment" class="form-control" placeholder="Enter a comment"></textarea>
			</div>
		</form>
		<ul class="media-list">
			<li v-repeat="comment in comments" class="media">
				<div class="media-left">
					<a href="#">
						<img class="media-object img-circle" src="http://www.gravatar.com/avatar/" alt="Avatar">
					</a>
				</div>
				<div class="media-body">
					<div class="well">
						<h4 class="media-heading">
							<strong>@{{ comment.user.name }}</strong>
						</h4>
						<p>@{{ comment.body }}</p>
					</div>
				</div>
			</li>
		</ul>
	</div>
@endif