<form method="post" action="/ask">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" name="title" required="">
	</div>

	<div class="form-group">
		<label>Description</label>
		<textarea id="description_editor" name="description" class="form-control" cols="30" rows="7" required=""></textarea>
	</div>

	<div class="form-group">
		<label>Video Url (optional)</label>
		<input type="text" class="form-control" name="video_url">
	</div>

	<div class="form-group">
		<label>Tags</label>
		<select data-placeholder="Choose tags" name="tags[]" id="tags_select_box" class="form-control" multiple="" placeholder="Select tags">
			@foreach($tags as $tagValue => $tagName)
				<option value="{{ $tagValue }}">{{ $tagName }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<input type="submit" value="Ask the question" class="btn btn-primary">
	</div>

</form>