<?php

namespace App\Search\Traits;

use App;
use App\Contracts\Search;

trait SearchableModel
{
	public static function boot()
	{
		$search = App::make(Search::class);

		parent::boot();

		parent::created(function($post) use ($search) {
			$search->index(self::$indexName, $post);
		});

		parent::deleted(function($post) use ($search) {
			$search->delete(self::$indexName, $post);
		});

	}
}