<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Jobs\StoreAnswerCommand;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\StoreAnswerRequest;

class AnswersController extends Controller
{

	public function __construct()
	{
		$this->middleware(Authenticate::class);
	}

    public function store(StoreAnswerRequest $request)
    {
    	$answer = $this->dispatch(
    		new StoreAnswerCommand($request->website, $request->video_url, $request->description, $request->post_id, \Auth::user()->id)
    	);

    	return $answer;
    }
}
