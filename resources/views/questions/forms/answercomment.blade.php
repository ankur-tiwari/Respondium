@if(\Auth::check())
	<div class="row">
		<div class="col-md-12">
			<form class="answer_comment_form">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="post_id" value="{{ $answer->id }}">	
				<div class="form-group">
					<textarea name="body" class="form-control" placeholder="Write a comment"></textarea>
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Comment</button>
				</div>
			</form>
		</div>
	</div>
@endif