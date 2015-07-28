<?php

namespace App\Jobs\Comments;

use App\Jobs\Job;
use App\Repositories\CommentInterface as CommentRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class Store extends Job implements SelfHandling
{
    protected $body;

    protected $userId;

    protected $postId;

    public function __construct($body, $userId, $postId)
    {
        $this->body = $body;

        $this->userId = $userId;

        $this->postId = $postId;
    }

    public function handle(CommentRepository $repo)
    {
        $comment = $repo->saveQuestionComment($this->body, $this->userId, $this->postId);

        return $comment;
    }
}
