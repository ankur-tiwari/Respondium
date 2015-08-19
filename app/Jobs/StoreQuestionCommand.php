<?php

namespace App\Jobs;

use App\Events\QuestionWasCreated;
use App\Jobs\Job;
use App\Question;
use Event;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StoreQuestionCommand extends Job implements SelfHandling
{
    public $title;

    public $description;

    public $userId;

    public $tagIds;

    public function __construct($title, $description, $userId, $tagIds=[], $videoUrl)
    {
        $this->title = $title;

        $this->description = $description;

        $this->userId = $userId;

        $this->tagIds = $tagIds;

        $this->videoUrl = $videoUrl;
    }

    /**
     * Store a new question.
     *
     * @return void
     */
    public function handle()
    {
        $question = new Question([
            'title'         => $this->title,
            'description'   => $this->description,
            'slug'          => Str::slug($this->title)
        ]);

        $question->user_id = $this->userId;

        $question->user_id = $this->userId;

        $question->video_url = $this->videoUrl ?: null;

        $question->save();

        $question->tags()->sync($this->tagIds ?: []);

        Event::fire(
            new QuestionWasCreated($question)
        );

        return $question;
    }
}
