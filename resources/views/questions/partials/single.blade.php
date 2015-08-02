<div class="row single-question">
	<div class="col-md-12">
		<h2 class="single-question-title">{{ $question->title }}</h2>
		<p>{!! $question->description !!}</p>
	</div>
	<div class="col-md-12 single-question-buttons" v-el="question" data-post="{{ $question->id }}">
		<a v-on="click: upvote" v-class="disabled: (upvoted || unauthorized)" href="" class="btn btn-primary btn-sm upvote">Upvote <span class="badge">@{{ upvotes }}</span> </a>
		<a  v-on="click: downvote" v-class="disabled: (downvoted || unauthorized)" href="" class="btn btn-primary btn-sm downvote">Downvote <span class="badge">@{{ downvotes }}</span></a>
		<a href="" class="btn btn-success btn-sm pull-right">Share</a>
	</div>
</div>
