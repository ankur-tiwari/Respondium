<?php

namespace App\Jobs\Comments;

use App\Jobs\Job;
use App\Repositories\CommentInterface as CommentRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class Store extends Job implements SelfHandling
{
    protected $body;

    protected $userId;

    protected $questionId;

    public function __construct($body, $userId, $questionId)
    {
        $this->body = $body;

        $this->userId = $userId;

        $this->questionId = $questionId;
    }

    public function handle(CommentRepository $repo)
    {
        $comment = $repo->saveQuestionComment($this->body, $this->userId, $this->questionId);

        return $comment;
    }
}
