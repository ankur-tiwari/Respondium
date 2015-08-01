<?php

namespace App\Repositories\Eloquent;

use App\Post;
use App\Answer;
use App\Comment as CommentModel;
use App\Repositories\CommentInterface;

class Comment implements CommentInterface
{
	protected $post;

	protected $comment;

	public function __construct(Post $post, CommentModel $comment)
	{
		$this->post = $post;

		$this->comment = $comment;
	}

	public function getByPostId($postId)
	{
		$comments = $this->comment->where('commentable_id', $postId)->where('commentable_type', Post::class)->with('user')->get();

		return $comments;
	}

	public function saveQuestionComment($body, $userId, $postId)
	{
		$post = Post::findOrFail($postId);

		$comment = new CommentModel();

		$comment->user_id = $userId;

		$comment->body = $body;

		$post->comments()->save($comment);

		return $this->comment->where('id', $comment->id)->with('user')->firstOrFail();
	}

	public function getByAnswerId($answerId)
	{
		$comments = $this->comment
						 ->where('commentable_id', $answerId)
						 ->where('commentable_type', Answer::class)
						 ->with('user')
						 ->get();

		return $comments;
	}

	public function saveAnswerComment($body, $userId, $answerId)
	{
		$answer = Answer::findOrFail($answerId);

		$comment = new CommentModel();

		$comment->user_id = $userId;

		$comment->body = $body;

		$answer->comments()->save($comment);

		return $this->comment->where('id', $comment->id)->with('user')->firstOrFail();
	}
}
