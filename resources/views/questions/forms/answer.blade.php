@if (\Auth::check())
	<div class="row">
		<div class="col-md-12">
			<h2>Your Answer</h2>
			<hr>
			<form id="answer_form" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="post_id" value="{{ $question->id }}">
				<div class="form-group">
					<label>Website</label>
					<select class="form-control" name="website" required>
						<option value="youtube">Youtube</option>
						<option value="vimeo">Vimeo</option>
						<option value="dailymotion">Dailymotion</option>
					</select>
				</div>
				<div class="form-group">
					<label>Link</label>
					<input name="video_url" type="url" class="form-control" placeholder="e.g. http://youtube.com/watch?v=zxi123" required>
				</div>
				<div class="form-group">
					<label>Description: </label>
					<textarea name="description" id="answer_description_textarea" required></textarea>
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Submit Your Answer</button>
				</div>
			</form>
		</div>
	</div>
@endif