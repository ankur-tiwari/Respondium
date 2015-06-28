<?php

namespace App\Jobs;

use App\Post;
use App\Jobs\Job;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Bus\SelfHandling;

class StoreQuestionCommand extends Job implements SelfHandling
{
    public $title;
    public $description;
    public $userId;

    public function __construct($title, $description, $userId)
    {
        $this->title = $title;
        $this->description = $description;
        $this->userId = $userId;
    }

    /**
     * Store a new question.
     *
     * @return void
     */
    public function handle()
    {
        $question = new Post();

        $question->type = 'question';

        $question->title = $this->title;

        $question->description = $this->description;

        $question->slug = Str::slug($this->title);

        $question->user_id = Auth::user()->id;

        $question->save();
    }
}
