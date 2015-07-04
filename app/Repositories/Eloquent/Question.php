<?php

namespace App\Repositories\Eloquent;

use App\Tag;
use App\Vote;
use App\Post;
use App\View;
use App\PostTagPivot;
use App\Repositories\QuestionInterface;

class Question implements QuestionInterface
{
	public function getMainFeed()
	{
		return Post::where('type', 'question')->with('answers')->with('comments')->latest()->paginate(10);
	}

	public function getForTag($tagName)
	{
		$tagId = Tag::where('name', $tagName)->firstOrFail()->id;

		$postIds = PostTagPivot::where('tag_id', $tagId)->get()->lists('post_id')->toArray();

		return Post::whereIn('id', $postIds)->latest()->paginate(10);
	}

	public function getBySlug($slug)
	{
		return Post::where('type', 'question')->where('slug', $slug)->with('comments')->firstOrFail();
	}

	public function getViewsFor($postId)
	{
		return View::where('post_id', $postId)->get()->count();
	}

	public function getVotesFor($postId)
	{
		$upvotes = Vote::where('post_id', $postId)->where('type', 'upvote')->get()->count();

		$downvotes = Vote::where('post_id', $postId)->where('type', 'downvote')->get()->count();

		return $upvotes - $downvotes;
	}

}
