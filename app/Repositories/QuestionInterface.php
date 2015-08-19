<?php

namespace App\Repositories;

interface QuestionInterface
{
	public function getMainFeed();

	public function getForTag($tagName);

	public function getBySlug($slug);

	public function getVotesFor($postId);

	public function findByIds($ids);

	public function updateBySlug($slug, $updates=[]);

	public function deleteBySlug($slug);

	public function deleteBySlugIfAuthored($slug, $userId);
}
