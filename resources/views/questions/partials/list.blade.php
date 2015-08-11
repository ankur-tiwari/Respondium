<li class="list-group-item question-item">
	<div class="row">
		<div class="col-md-12">
			<h4 class="list-group-item-heading" style="font-weight: bold">
				<a href="/questions/{{ $question->slug }}">{{ $question->title }}</a>
			</h4>
			<p>{{ str_limit($question->description, 400) }}</p>
			<div class="question-tags">
				@foreach($question->tags as $tag)
					<a href="/tagged/{{ $tag->name }}" class="label label-primary">{{ $tag->name }}</a>
				@endforeach
			</div>
		</div>
	</div>
</li>
