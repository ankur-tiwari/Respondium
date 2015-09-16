<?php

namespace App\Services\Search;

use App\Services\Search\SearchInterface;
use App\Services\Search\Searchable;

class Eloquent implements SearchInterface
{
	protected $model;

	public function model(Searchable $model)
	{
		$this->model = $model;

		return $this;
	}

	public function withKeyword($keyword)
	{
		return $this->model->search($keyword);
	}
}