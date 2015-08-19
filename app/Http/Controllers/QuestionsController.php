<?php

namespace App\Http\Controllers;

use Alert;
use App\Contracts\Search;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests;
use App\Http\Requests\StoreQuestionRequest;
use App\Jobs\StoreQuestionCommand;
use App\Jobs\StoreViewCommand;
use App\Repositories\QuestionInterface as QuestionRepository;
use App\Repositories\TagInterface as TagRepository;
use App\Tag;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionsController extends Controller
{
    /**
     * @var Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    public function __construct(Guard $auth, QuestionRepository $questionRepo, TagRepository $tagRepo)
    {
        $this->middleware(Authenticate::class, [
            'except' => ['index', 'show', 'search']
        ]);

        $this->questionRepo = $questionRepo;

        $this->tagRepo = $tagRepo;

        $this->auth = $auth;
    }

    public function index(QuestionRepository $questionRepo)
    {
        $questions = $questionRepo->getMainFeed();

        return view('questions.index', compact('questions'))
            ->with('page', 'Home')
            ->with('title', 'Home');
    }

    public function create()
    {
        $tags = $this->tagRepo->getAll();

        return view('questions.create', compact('tags'))->with('title', 'Ask')->with('page', 'Ask');
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = $this->dispatch(
            new StoreQuestionCommand($request->title, $request->description, $this->auth->user()->id, $request->tags, $request->video_url)
        );

        Alert::success('Your question was posted successfully.');

        return redirect('/questions/' . $question->slug);
    }

    public function show($slug)
    {
        $question = $this->questionRepo->getBySlug($slug);

        return view('questions.show', compact('question'));
    }

    public function edit($slug)
    {
        $question = $this->questionRepo->getBySlug($slug);

        if ( $this->auth->user()->id !== $question->user->id ) {
            Alert::error('You are not authorized to update this question', 'Whoops!');

            return redirect()->back();
        }

        $tags = $this->tagRepo->getForQuestion($question);

        return view('questions.edit', compact('question', 'tags'));
    }

    public function update($slug, Request $request)
    {
        if ( $this->auth->user()->id !== $this->questionRepo->getBySlug($slug)->user->id ) {
            Alert::error('You are not authorized to update this question', 'Whoops!');

            return redirect()->back();
        }

        $this->questionRepo->updateBySlug($slug, $request->only('title', 'description', 'tags'));

        Alert::success('You have successfully updated your question');

        return redirect('/questions/' . $slug);
    }

    public function destroy($slug)
    {
       $deleted = $this->questionRepo->deleteBySlugIfAuthored($slug, $this->auth->user()->id);

       if ($deleted) {
            Alert::success('Deleted the question successfully');
            return redirect('/');
       }

       return;
    }

    public function search($query, Request $request, Search $search)
    {
        $ids = $search->getIds('questions', $query);

        $results = $this->questionsRepo->findByIds($ids);

        return view('questions.search', compact('results'));
    }
}
