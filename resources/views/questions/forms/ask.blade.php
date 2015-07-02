<form method="post">

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
		<label>Tags</label>
		<select name="tags[]" id="tags_select_box" class="form-control" multiple="" placeholder="Select tags">
			@foreach($tags as $tag)
				<option value="{{$tag->id}}">{{ $tag->name}}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<input type="submit" value="Ask" class="btn btn-primary">
	</div>

</form>