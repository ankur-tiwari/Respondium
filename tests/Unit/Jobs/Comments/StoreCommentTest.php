<?php

use App\Jobs\Comments\Store;
use App\Post;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Repositories\CommentInterface as CommentRepository;

class StoreComment extends TestCase
{
	use DatabaseTransactions, DispatchesJobs;

	/** @test */
	public function it_creates_a_new_comment()
	{
		$user = factory(User::class)->create();
		$question = factory(Post::class)->create([
			'user_id' => $user->id
		]);
		$commentBody = 'Good Comment!';

		$this->dispatch(
			new Store($commentBody, $user->id, $question->id, App::make(CommentRepository::class))
		);

		$this->seeInDatabase('comments', [
			'body' => $commentBody,
			'user_id' => $user->id,
			'commentable_id' => $question->id,
			'commentable_type' => Post::class
		]);
	}
}
