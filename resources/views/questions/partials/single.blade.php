<div class="row single-question">
	<div class="col-md-12">
		<h2 class="single-question-title">{{ $question->title }}</h2>
		<p>{!! $question->description !!}</p>

		<div class="btn-group action-bar" role="group">
			<button type="button" class="btn btn-primary" data-toggle="tooltip" title="Like it">
				<i class="fa fa-thumbs-o-up"></i>
			</button>
			<button type="button" class="btn btn-primary" data-toggle="tooltip" title="Favourite">
				<i class="fa fa-heart-o"></i>
			</button>
			<button type="button" class="btn btn-primary" data-toggle="tooltip" title="Share">
				<i class="fa fa-share-square-o"></i>
			</button>
		</div>
	</div>

</div>
