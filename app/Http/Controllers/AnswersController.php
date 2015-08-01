<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Jobs\StoreAnswerCommand;
use App\Jobs\UploadVideoCommand;
use App\Repositories\CommentInterface as CommentRepository;
use Auth;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
	public function __construct()
	{
		$this->middleware(Authenticate::class, [
			'except' => 'listComments'
		]);
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

	public function listComments($answerId, CommentRepository $repo)
	{
		$comments = $repo->getByAnswerId($answerId);

		return $comments;
	}

	public function storeComments($answerId, StoreCommentRequest $request, CommentRepository $repo)
	{
		$comment = $repo->saveAnswerComment($request->body, Auth::user()->id, $answerId);

		return $comment;
	}
}
