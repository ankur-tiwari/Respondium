<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class QuestionWasCreated extends Event
{
    use SerializesModels;

    public $question;

    public function __construct($question)
    {
        $this->question = $question;
    }

    public function broadcastOn()
    {
        return [];
    }
}
