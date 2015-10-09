<li class="list-group-item question-item" itemscope itemtype="http://schema.org/Question">
	<div class="row">
		<div class="col-md-12">
			<h4 class="list-group-item-heading" style="font-weight: bold">
				<a itemprop="headline" href="/questions/{{ $question->slug }}">{{ $question->title }}</a>
			</h4>
			<p itemprop="description">{{ str_limit($question->description, 400) }}</p>
			<div class="question-tags">
				@foreach($question->tags as $tag)
					<a href="/tagged/{{ $tag->name }}" class="label label-default">{{ $tag->name }}</a>
				@endforeach
			</div>
		</div>
	</div>
</li>
