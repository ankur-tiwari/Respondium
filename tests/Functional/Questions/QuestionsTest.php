<?php

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;

class QuestionsTest extends TestCase
{
	use DatabaseTransactions;

    public function test_it_displays_questions_on_the_front_page()
    {
    	$user = $this->registeredUser();

    	$questions = factory(Post::class, 2)->create([
    		'user_id' => $user->id
    	]);

    	$this->visit('/')
    		 ->see($questions[0]->title)
    		 ->see($questions[1]->title);
    }
}
