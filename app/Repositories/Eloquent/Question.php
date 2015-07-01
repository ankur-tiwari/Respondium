<?php

namespace App\Repositories\Eloquent;

use App\Tag;
use App\Post;
use App\PostTagPivot;
use App\Repositories\QuestionInterface;

class Question implements QuestionInterface
{
	public function getMainFeed()
	{
		return Post::where('type', 'question')->with('comments')->latest()->paginate(10);
	}

	public function getForTag($tagName)
	{
		$tagId = Tag::where('name', $tagName)->firstOrFail()->id;

		$postIds = PostTagPivot::where('tag_id', $tagId)->get()->lists('post_id')->toArray();

		return Post::whereIn('id', $postIds)->latest()->paginate(10);
	}
}
