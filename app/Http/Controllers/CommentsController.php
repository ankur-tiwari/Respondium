<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests;
use App\Http\Requests\StoreCommentRequest;
use App\Jobs\Comments\Store;
use App\Jobs\StoreAnswersCommentCommand;
use App\Jobs\StoreCommentCommand;
use App\Repositories\CommentInterface as CommentRepository;
use Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class, [
            'except' => 'index'
        ]);
    }

    public function index($postId, CommentRepository $repo)
    {
        $repo->getByPostId($postId);
    }

    public function store($postId, StoreCommentRequest $request)
    {
        $comment = $this->dispatch(
            new Store($request->body, Auth::user()->id, $postId)
        );

        return $comment;
    }
}
