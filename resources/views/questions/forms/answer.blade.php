@if (Auth::check())
<form action="/answers/upload" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="answer_form_modal_upload">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Post your answer</h4>
				</div>
				<div class="modal-body">
						{!! csrf_field() !!}
						<input type="hidden" name="post_id" value="{{ $question->id }}">
						<div class="form-group">
							<label>Upload an mp4</label>
							<input type="file" name="video_file" class="form-control">
						</div>
						<div class="form-group">
							<label>Description</label>
							<input type="text" name="description" class="form-control" required>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Post</button>
				</div>
			</div>
		</div>
	</div>
</form>

<form action="/answers" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="answer_form_modal_link">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Post your answer</h4>
				</div>
				<div class="modal-body">
						{!! csrf_field() !!}
						<input type="hidden" name="post_id" value="{{ $question->id }}">

						<div class="form-group">
							<label>Add a link</label>
							<input type="url" name="video_url" class="form-control" placeholder="http://youtube.com/watch?v=123123">
						</div>
						<div class="form-group">
							<label>Description</label>
							<input type="text" name="description" class="form-control" required>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Post</button>
				</div>
			</div>
		</div>
	</div>
</form>

<div class="row">
	<div class="col-md-12">
		<h2>Post your answer</h2>
		<hr>
		<a class="btn btn-primary" data-toggle="modal" href="#answer_form_modal_upload">Upload a video</a>
		<a class="btn btn-primary" data-toggle="modal" href="#answer_form_modal_link">Post a video link</a>
	</div>
</div>

@endif