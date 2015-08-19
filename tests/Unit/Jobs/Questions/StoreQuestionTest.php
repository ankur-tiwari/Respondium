<?php

use App\Events\QuestionWasCreated;
use App\Jobs\StoreQuestionCommand;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StoreTest extends TestCase
{
	use DatabaseTransactions, DispatchesJobs;

	/** @test */
	public function it_tests_if_it_creates_a_record_in_the_database()
	{
		$user = factory(User::class)->create();

		$tagIds = factory(Tag::class, 2)->create()->lists('id')->toArray();

		$dummyQuestionToCreate = [
			'title'			=> 'My Question Title',
			'description'	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
			'userId'		=> $user->id,
			'tagIds'		=> $tagIds,
			'video_url' 	=> 'https://vimeo.com/135486928',
		];

		$this->expectsEvents(QuestionWasCreated::class);

		$newQuestion = $this->dispatch(
			new StoreQuestionCommand($dummyQuestionToCreate['title'], $dummyQuestionToCreate['description'], $dummyQuestionToCreate['userId'], $dummyQuestionToCreate['tagIds'], $dummyQuestionToCreate['video_url'])
		);

		$this->seeInDatabase('posts', $newQuestion->toArray());
	}
}
