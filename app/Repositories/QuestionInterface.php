<?php

namespace App\Repositories;

interface QuestionInterface
{
	public function getMainFeed();

	public function getForTag($tagName);
}
