<?php

namespace App\Search;

use App\Contracts\Search;

class Dummy implements Search
{
	public function __construct()
	{
	}

	public function index($indexName, $model)
	{
		return;
	}

	public function search($indexName, $query)
	{
		return [];
	}

	public function delete($indexName, $model)
	{
		return;
	}

	public function getIds($indexName, $query)
	{
		return [];
	}

	private function getModelsData($hits)
	{
		return [];
	}

	private function performSearch($indexName, $query)
	{
		return [];
	}
}