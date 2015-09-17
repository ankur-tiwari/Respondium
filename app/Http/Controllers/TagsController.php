<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Middleware\OnlyMe;
use App\Http\Requests;
use App\Repositories\QuestionInterface as QuestionRepository;
use App\Repositories\TagInterface;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware(OnlyMe::class, [
            'except' => 'show'
        ]);
    }

    public function index(TagInterface $tagsRepo)
    {
        $tags = $tagsRepo->getAllNames();

        return view('tags.index', compact('tags'));
    }

    public function show($tagName, QuestionRepository $questionRepo, TagInterface $tagsRepo)
    {
        $questions = $questionRepo->getForTag($tagName);

        $tags = $tagsRepo->getAll();

        return view('questions.index', compact('questions', 'tags'));
    }

    public function create()
    {
    	return view('tags.create');
    }

    public function store(TagInterface $tagsRepo, Request $request)
    {
    	$tagsRepo->create($request->name);

        return redirect('/tags');
    }
}
