<?php

namespace App\Contracts;

interface Search
{
	public function index($indexName, $model);

	public function search($indexName, $query);

	public function delete($indexName, $model);

	public function getIds($indexName, $query);
}