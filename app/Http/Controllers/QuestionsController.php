<?php

namespace App\Http\Controllers;


use App\Tag;
use App\Post;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\StoreViewCommand;
use App\Jobs\StoreQuestionCommand;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\StoreQuestionRequest;
use App\Repositories\QuestionInterface as QuestionRepository;

class QuestionsController extends Controller
{

    public function __construct()
    {
        $this->middleware(Authenticate::class, [
            'except' => ['index', 'show']
        ]);
    }

    public function index(QuestionRepository $questionRepo)
    {
        $questions = $questionRepo->getMainFeed();

        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        $tags = Tag::orderBy('created_at', 'DESC')->get();

        return view('questions.create', compact('tags'));
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = $this->dispatch(
            new StoreQuestionCommand($request->title, $request->description, Auth::user()->id, $request->tags)
        );

        return redirect('/')->with('flash_message', 'Your question has been submitted!');
    }

    public function show($slug, QuestionRepository $questionRepo)
    {
        $question = $questionRepo->getBySlug($slug);

        $this->dispatch(
            new StoreViewCommand($_SERVER['REMOTE_ADDR'], $question->id)
        );

        return view('questions.show', compact('question'));
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
