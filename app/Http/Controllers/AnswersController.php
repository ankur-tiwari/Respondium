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
use Alert;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard as Auth;

class AnswersController extends Controller
{
	/**
	 * @var \Illuminate\Contracts\Auth\Guard $auth
	 */
	protected $auth;

	public function __construct(Auth $auth)
	{
		$this->middleware(Authenticate::class, [
			'except' => 'listComments'
		]);

		$this->auth = $auth;
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
			new StoreAnswerCommand($filePath, $request->description, $request->post_id, $this->auth->user()->id)
		);

		return redirect()->back();
	}

	public function store($id, StoreAnswerRequest $request)
	{
		$this->dispatch(
			new StoreAnswerCommand($request->video_url, $request->description, $id, $this->auth->user()->id)
		);

		Alert::success('Your answer was posted successfully.');

		return redirect()->back();
	}

	public function listComments($answerId, CommentRepository $repo)
	{
		$comments = $repo->getByAnswerId($answerId);

		return $comments;
	}

	public function storeComments($answerId, StoreCommentRequest $request, CommentRepository $repo)
	{
		$comment = $repo->saveAnswerComment($request->body, $this->auth->user()->id, $answerId);

		return $comment;
	}
}
