<?php

namespace App\Jobs;

use App\Comment;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class StoreCommentCommand extends Job implements SelfHandling
{

    public $body;

    public $userId;

    public $commentableId;

    public $commentableType;

    public function __construct($body, $userId, $commentableId, $commentableType)
    {
        $this->body = $body;

        $this->userId = $userId;

        $this->commentableId = $commentableId;

        $this->commentableType = $commentableType;
    }

    /**
     * Store a new comment.
     *
     * @return void
     */
    public function handle()
    {
        $comment = new Comment();

        $comment->body = $this->body;

        $comment->user_id = $this->userId;

        $comment->commentable_id = $this->commentableId;

        $comment->commentable_type = $this->commentableType;

        $comment->save();

        // TODO: Raise an event.

        return $comment;
    }
}
