@if (Auth::check())

<div class="panel panel-primary">
	<div class="panel-heading">Post a video</div>
	<div class="panel-body">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#by_link_form" aria-controls="home" role="tab" data-toggle="tab">Via Link</a></li>
			<li role="presentation"><a href="#by_upload_form" aria-controls="profile" role="tab" data-toggle="tab">Upload an mp4</a></li>
		</ul>

		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active in fade" id="by_link_form">
				<form action="/questions/{{ $question->id }}/answers" method="post" enctype="multipart/form-data">
					<br>
					{!! csrf_field() !!}
					{{-- <input type="hidden" name="post_id" value="{{ $question->id }}"> --}}

					<div class="form-group">
						<input type="url" name="video_url" class="form-control" placeholder="http://youtube.com/watch?v=123123">
						<p class="help-block">Paste a link from the sites YouTube, Vimeo and Dailymotion</p>
					</div>
					<div class="form-group">
						<textarea name="description" class="form-control" required></textarea>
						<p class="help-block">A little description for your video</p>
					</div>
					<div class="form-group">
						<button class="btn btn-default">
							<i class="fa fa-video-camera"></i>
							Post
						</button>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="by_upload_form">

				<form action="/answers/upload" method="post" enctype="multipart/form-data">
					<br>
					{!! csrf_field() !!}
					<input type="hidden" name="post_id" value="{{ $question->id }}">
					<div class="form-group">
						<input type="file" name="video_file" class="form-control">
						<p class="help-block">Attach a .mp4 video file.</p>
					</div>
					<div class="form-group">
						<textarea name="description" class="form-control" required></textarea>
						<p class="help-block">A little description for your video</p>
					</div>
					<div class="form-group">
						<button class="btn btn-default">
							<i class="fa fa-upload"></i>
							Upload
						</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

@endif