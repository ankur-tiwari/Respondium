<?php

namespace App\Services\Search;

interface Searchable
{
	public function search($keyword);
}