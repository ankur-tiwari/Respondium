<?php

namespace App\Jobs;

use Event;
use App\Post;
use App\Jobs\Job;
use Illuminate\Support\Str;
use App\Events\QuestionWasCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Bus\SelfHandling;

class StoreQuestionCommand extends Job implements SelfHandling
{
    public $title;

    public $description;

    public $userId;

    public $tagIds;

    public function __construct($title, $description, $userId, $tagIds=[])
    {
        $this->title = $title;

        $this->description = $description;

        $this->userId = $userId;

        $this->tagIds = $tagIds;
    }

    /**
     * Store a new question.
     *
     * @return void
     */
    public function handle()
    {
        $question = new Post([
            'title'         => $this->title,
            'description'   => $this->description,
            'slug'          => Str::slug($this->title)
        ]);

        $question->user_id = $this->userId;

        $question->type = 'question';

        $question->user_id = $this->userId;

        $question->save();

        $question->tags()->sync($this->tagIds);

        Event::fire(
            new QuestionWasCreated($question)
        );

        return $question;
    }
}
