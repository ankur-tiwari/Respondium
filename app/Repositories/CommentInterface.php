<?php

namespace App\Repositories;

interface CommentInterface
{
	public function getByPostId($postId);

	public function saveQuestionComment($body, $userId, $postId);

	public function getByAnswerId($answerId);

	public function saveAnswerComment($body, $userId, $answerId);
}
