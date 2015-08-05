<?php

namespace App\Http\Controllers;

use App\Contracts\Search;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests;
use App\Http\Requests\StoreQuestionRequest;
use App\Jobs\StoreQuestionCommand;
use App\Jobs\StoreViewCommand;
use App\Post;
use App\Repositories\QuestionInterface as QuestionRepository;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuestionsController extends Controller
{

    public function __construct()
    {
        $this->middleware(Authenticate::class, [
            'except' => ['index', 'show', 'search']
        ]);
    }

    public function index(QuestionRepository $questionRepo)
    {
        $questions = $questionRepo->getMainFeed();

        return view('questions.index', compact('questions'))->with('page', 'Home');
    }

    public function create()
    {
        $tags = Tag::orderBy('created_at', 'DESC')->get();

        return view('questions.create', compact('tags'))->with('title', 'Ask')->with('page', 'Ask');
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = $this->dispatch(
            new StoreQuestionCommand($request->title, $request->description, Auth::user()->id, $request->tags)
        );

        return redirect('/questions/' . $question->slug)->with('flash_message', 'Your question was posted successfully.');
    }

    public function show($slug, QuestionRepository $questionRepo)
    {
        $question = $questionRepo->getBySlug($slug);

        $this->dispatch(
            new StoreViewCommand($_SERVER['REMOTE_ADDR'], $question->id)
        );

        return view('questions.show', compact('question'));
    }

    public function search($query, Request $request, Search $search, QuestionRepository $questionsRepo)
    {
        $ids = $search->getIds('questions', $query);

        $results = $questionsRepo->findByIds($ids);

        return view('questions.search', compact('results'));
    }
}
