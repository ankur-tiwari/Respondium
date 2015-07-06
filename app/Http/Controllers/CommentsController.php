<?php

namespace App\Http\Controllers;

use Auth;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Jobs\StoreCommentCommand;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Jobs\StoreAnswersCommentCommand;
use App\Http\Requests\StoreCommentRequest;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    public function store(StoreCommentRequest $request)
    {
        $comment = $this->dispatch(
            new StoreCommentCommand($request->body, Auth::user()->id, $request->post_id, false)
        );

        return Comment::with('user')->where('id', $comment->id)->first();
    }
    
    public function storeAnswersComment(StoreCommentRequest $request)
    {
        $comment = $this->dispatch(
            new StoreCommentCommand($request->body, Auth::user()->id, $request->post_id, true)
        );
        
        return Comment::with('user')->where('id', $comment->id)->first();
    }

}
