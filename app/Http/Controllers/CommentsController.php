<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Jobs\StoreCommentCommand;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    public function store(Request $request)
    {
        $comment = $this->dispatch(
            new StoreCommentCommand($request->body, Auth::user()->id, $request->post_id)
        );

        return $comment;
    }

    public function getCommentsForPost($postId)
    {

    }
}
