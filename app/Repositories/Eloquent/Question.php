<?php

namespace App\Repositories\Eloquent;

use App\Tag;
use App\Vote;
use App\Question as QuestionModel;
use App\View;
use App\QuestionTagPivot;
use App\Repositories\QuestionInterface;

class Question implements QuestionInterface
{
	protected $question;

	public function __construct(QuestionModel $question)
	{
		$this->question = $question;
	}

	public function getMainFeed()
	{
		return $this->question->latest()->paginate(10);
	}

	public function getForTag($tagName)
	{
		$tagId = Tag::where('name', $tagName)->firstOrFail()->id;

		$postIds = QuestionTagPivot::where('tag_id', $tagId)->get()->lists('question_id')->toArray();

		return $this->question->whereIn('id', $postIds)->latest()->paginate(10);
	}

	public function getBySlug($slug)
	{
		return $this->question->where('slug', $slug)->with('comments')->with([
			'answers' => function($query) {
			 	$query->with('comments');
			}
		])->firstOrFail();
	}

	public function getVotesFor($postId)
	{
		$upvotes = Vote::where('post_id', $postId)->where('type', 'upvote')->get()->count();

		$downvotes = Vote::where('post_id', $postId)->where('type', 'downvote')->get()->count();

		return $upvotes - $downvotes;
	}

	public function findByIds($ids)
	{
		return $this->question->whereIn('id', $ids)->latest()->paginate(10);
	}

	public function updateBySlug($slug, $updates=[])
	{
		$question = $this->question->where('slug', $slug)->firstOrFail();

		$question->title = $updates['title'];

		$question->description = $updates['description'];

		$question->tags()->sync($updates['tags']);

		$question->save();

		return $question;
	}

	public function deleteBySlug($slug)
	{
		return $this->getBySlug($slug)->delete();
	}

	public function deleteBySlugIfAuthored($slug, $userId)
	{
		$question = $this->getBySlug($slug);

		if ( $question->user_id === $userId ) {
			return $question->delete();
		}

		return false;
	}

	public function top($howMany=10)
	{
		return $this->question
			->limit(10)
			->orderBy('created_at', 'DESC')
			->with('user')
			->get();
	}
}
