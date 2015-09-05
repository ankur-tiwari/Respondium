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

	public function getAllNames()
	{
        return TagModel::latest()->get([
        	'id', 'name'
        ]);
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

	public function create($name)
	{
		return TagModel::create([
			'name' => $name
		]);
	}
}
