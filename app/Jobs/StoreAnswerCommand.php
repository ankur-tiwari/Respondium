<?php

namespace App\Jobs;

use App\Answer;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class StoreAnswerCommand extends Job implements SelfHandling
{
    public $videoUrl;

    public $description;

    public $postId;

    public $userId;

    public function __construct($videoUrl, $description, $postId, $userId)
    {
        $this->videoUrl = $videoUrl;

        $this->description = $description;

        $this->postId = $postId;

        $this->userId = $userId;
    }

    public function handle()
    {
        $answer = new Answer();

        $answer->description = $this->description;

        $answer->video_url = $this->videoUrl;

        $answer->post_id = $this->postId;

        $answer->user_id = $this->userId;

        $answer->save();

        return $answer;
    }
}
