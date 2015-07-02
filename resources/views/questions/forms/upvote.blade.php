<form id="upvote_form" class="inline">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="post_id" value="{{ $question->id }}">
	<input type="hidden" name="type" value="upvote">
	<button class="btn btn-xs btn-success">Upvote</button>
</form>