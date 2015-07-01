<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\QuestionInterface as QuestionRepository;

class TagsController extends Controller
{
    public function show($tagName, QuestionRepository $questionRepo)
    {
        $questions = $questionRepo->getForTag($tagName);

        return view('questions.index', compact('questions'));
    }
}
