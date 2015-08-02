<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests;
use App\Http\Requests\StoreVoteRequest;
use App\Jobs\StoreVoteCommand;
use App\Post;
use App\Vote;
use Auth;
use Illuminate\Http\Request;

class VotesController extends Controller
{

    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    public function voted($postId)
    {
        $post = Post::findOrFail($postId);

        $vote = Vote::where('post_id', $post->id)
              ->where('user_id', Auth::user()->id)->first();

        if ($vote) {
            return [
                'voted' => true,
                'type' => $vote->type
            ];
        }

        return [
            'voted' => false
        ];
    }

    public function store($postId, StoreVoteRequest $request)
    {
        $vote = $this->dispatch(
            new StoreVoteCommand($postId, $request->type, Auth::user()->id)
        );

        if (is_null($vote)) {
            return abort(404);
        }

        return $vote;
    }

    public function upvotes($postId)
    {
        $post = Post::findOrFail($postId);

        $votes = Vote::where('post_id', $post->id)->where('type', 'upvote')->get();

        return [
            'count' => $votes->count()
        ];
    }

    public function downvotes($postId)
    {
        $post = Post::findOrFail($postId);

        $votes = Vote::where('post_id', $post->id)->where('type', 'downvote')->get();

        return [
            'count' => $votes->count()
        ];
    }
}
