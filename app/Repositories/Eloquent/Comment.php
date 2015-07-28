<?php

namespace App\Repositories\Eloquent;

use App\Comment as CommentModel;
use App\Post;
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
		$comments = $this->comment->where('commentable_id', $postId)->where('commentable_type', Post::class)->get();

		dd($comments);
	}

	public function saveQuestionComment($body, $userId, $postId)
	{
		$comment = new CommentModel();

		$comment->body = $body;

		$comment->user_id = $userId;

		$comment->commentable_type = Post::class;

		$comment->commentable_id = $postId;

		$comment->save();

		return $this->comment->findOrFail($comment->id);
	}
}