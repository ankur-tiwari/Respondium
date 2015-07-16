<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Jobs\UploadVideoCommand;
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

	public function upload(Request $request)
	{
		if ($request->hasFile('video_file')) {
			$filePath = $this->dispatch(
				new UploadVideoCommand($request->file('video_file'))
			);
		} else {
			dd('No file');
		}

		$this->dispatch(
			new StoreAnswerCommand($filePath, $request->description, $request->post_id, Auth::user()->id)
		);

		return redirect()->back();
	}

	public function store(StoreAnswerRequest $request)
	{
		$this->dispatch(
			new StoreAnswerCommand($request->video_url, $request->description, $request->post_id, Auth::user()->id)
		);

		return redirect()->back();
	}
}
