<?php

namespace App\Jobs;

use App\Post;
use App\Answer;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Events\Dispatcher as Event;

class StoreAnswerCommand extends Job implements SelfHandling
{
    /**
     * @var string $videoUrl
     */
    public $videoUrl;

    /**
     * @var string $description
     */
    public $description;

    /**
     * @var int $postId
     */
    public $postId;

    /**
     * @var int $userId
     */
    public $userId;

    /**
     * Create the job instance
     *
     * @param string $videoUrl
     * @param string $description
     * @param int    $postId
     * @param int    $userId
     */
    public function __construct($videoUrl, $description, $postId, $userId)
    {
        $this->videoUrl = $videoUrl;
        $this->description = $description;
        $this->postId = $postId;
        $this->userId = $userId;
    }

    /**
     * Create a new answer.
     *
     * @return \App\Answer
     */
    public function handle(Event $event)
    {
        $question = Post::findOrFail($this->postId);

        $answer = $question->answers()->create([
            'description' => $this->description,
            'video_url' => $this->videoUrl,
            'user_id' => $this->userId
        ]);

        $event->fire('answer.store');

        return $answer;
    }
}
