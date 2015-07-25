<?php

namespace App\Search;

use App\Contracts\Search;
use Elasticsearch\Client as ElasticsearchClient;

class Elasticsearch implements Search
{
	protected $elasticSearchClient;

	public function __construct(ElasticsearchClient $elasticSearchClient)
	{
		$this->elasticSearchClient = $elasticSearchClient;
	}

	public function index($indexName, $model)
	{
		return $this->elasticSearchClient->index([
			'index' => 'answersvid',
			'type' 	=> $indexName,
			'body' 	=> $model,
			'id'	=> $model->id
		]);
	}

	public function search($indexName, $query)
	{
		$elasticSearchResults = $this->performSearch($indexName, $query);

		$modelResults = $this->getModelsData($elasticSearchResults['hits']['hits']);

		return $modelResults;
	}

	public function delete($indexName, $model)
	{
		return $this->elasticSearchClient->delete([
			'index' => 'answersvid',
			'type' 	=> $indexName,
			'id'	=> $model->id
		]);
	}

	public function getIds($indexName, $query)
	{
		$results = $this->performSearch($indexName, $query);

		$modelResults = $this->getModelsData($results['hits']['hits']);

		$ids = [];

		foreach($modelResults as $result) {
			$ids[] = $result['id'];
		}

		return $ids;
	}

	private function getModelsData($hits)
	{
		$resultsData = [];

		foreach($hits as $result) {
			$resultsData[] = $result['_source'];
		}

		return $resultsData;
	}

	private function performSearch($indexName, $query)
	{
		return $this->elasticSearchClient->search([
			'index' => 'answersvid',
			'type' => $indexName,
			'size' => 10000,
			'body' => [
				'query' => [
					'query_string' => [
						'query' => $query
					]
				]
			]
		]);
	}
}