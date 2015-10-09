<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Eloquent\Question;
use App\Repositories\Eloquent\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function show(Question $questionRepo, Tag $tagRepo)
	{
        $questions = $questionRepo->top(10);

        $tags = $tagRepo->getAll();

		return view('home.show')
			->with([
				'title' 	=> 'Home',
				'questions' => $questions,
				'tags'		=> $tags,
			]);
	}
}
