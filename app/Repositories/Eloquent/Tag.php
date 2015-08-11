<?php

namespace App\Repositories\Eloquent;

use App\Tag as TagModel;
use App\Repositories\TagInterface;

class Tag implements TagInterface
{
	public function getAll()
	{
        return TagModel::orderBy('created_at', 'DESC')->lists('name', 'id')->toArray();
	}

	public function getForQuestion($question)
	{
		$allTags = $this->getAll();

		$currentTags = $question->tags->lists('name', 'id')->toArray();

        $leftOverTags = array_diff($allTags, $currentTags);

		return [
			'current' => $currentTags,
			'leftOver' => $leftOverTags
		];
	}
}
