<?php

namespace App\Listeners;

use App\Search\Algolia;
use App\Events\QuestionWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddQuestionOnAlgolia
{
	protected $algolia;

    public function __construct(Algolia $algolia)
    {
    	$this->algolia = $algolia;
    }

    public function handle(QuestionWasCreated $event)
    {
    	$event->question->objectID = $event->question->id;

    	$index = $this->algolia->client->initIndex('questions');

    	$index->saveObject($event->question->toArray());
    }
}
