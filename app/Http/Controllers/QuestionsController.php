<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests;
use Illuminate\Support\Str;
use App\Jobs\StoreQuestionCommand;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;

class QuestionsController extends Controller
{

    /**
     * Display a listing of the questions.
     *
     * @return Response
     */
    public function index()
    {
        $questions = Post::where('type', '=' ,'question')->latest()->get();
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new question.
     *
     * @return Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreQuestionRequest $request)
    {
        $this->dispatch(
            new StoreQuestionCommand($request->title, $request->description, Auth::user()->id)
        );
        return redirect('/')->with('flash_message', 'Your question has been submitted!');
    }

    /**
     * Display the specified question.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $question = Post::where('type', 'question')->where('slug', $slug)->firstOrFail();
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
