@extends('layouts.front')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h1 class="page-header">Edit</h1>
			<form method="post" action="/questions/{{ $question->slug }}">
				{!! csrf_field() !!}
				<input type="hidden" name="_method" value="PUT">
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" value="{{ $question->title }}" class="form-control">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea name="description" class="form-control">{{ $question->description }}</textarea>
				</div>

				<div class="form-group">
					<label>Tags</label>
					<select data-placeholder="Choose tags" name="tags[]" id="tags_select_box" class="form-control" multiple="" placeholder="Select tags">
						@foreach($tags['current'] as $tagValue => $tagName)
							<option value="{{ $tagValue }}" selected="">{{ $tagName }}</option>
						@endforeach

						@foreach($tags['leftOver'] as $tagValue => $tagName)
							<option value="{{ $tagValue }}">{{ $tagName }}</option>
						@endforeach

					</select>
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
@stop