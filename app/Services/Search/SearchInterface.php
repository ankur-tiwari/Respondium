<?php

namespace App\Services\Search;

use App\Services\Search\Searchable;

interface SearchInterface
{
	public function model(Searchable $searchable);

	public function withKeyword($keyword);
}