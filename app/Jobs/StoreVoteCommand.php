<?php

namespace App\Jobs;

use App\Vote;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class StoreVoteCommand extends Job implements SelfHandling
{
    public $postId;

    public $type;

    public $userId;

    public function __construct($postId, $type, $userId)
    {
        $this->postId = $postId;

        $this->type = $type;

        $this->userId = $userId;
    }

    public function handle()
    {
        $alreadyExsistingVote = Vote::where('post_id', $this->postId)->where('user_id', $this->userId)->first();

        if (is_null($alreadyExsistingVote))
        {
            $vote = new Vote();

            $vote->type = $this->type;

            $vote->post_id = $this->postId;

            $vote->user_id = $this->userId;

            $vote->save();

            return $vote;
        } else {
            return false;
        }
    }
}
