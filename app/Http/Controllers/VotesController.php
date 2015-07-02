<?php

namespace App\Http\Controllers;

use Auth;
use App\Vote;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Jobs\StoreVoteCommand;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\StoreVoteRequest;

class VotesController extends Controller
{

    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    public function store(StoreVoteRequest $request)
    {
        $this->dispatch(
            new StoreVoteCommand($request->post_id, $request->type, Auth::user()->id)
        );
    }
}
