<?php

namespace App\Search;

class Algolia
{
	public $client;

	public function __construct()
	{
		$this->client = new \AlgoliaSearch\Client(env('ALGOLIA_APP_ID'), env('ALGOLIA_SEARCH_ONLY_API_KEY'));
	}
}
