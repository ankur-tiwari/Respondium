<?php
use App\Post;
use App\User;
use \FunctionalTester;

class PostQuestionCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    /** @test */
    public function it_allows_authenticated_users_to_post_a_new_question(FunctionalTester $I)
    {
        $I->am('a user');
        $I->wantTo('post a new question');

        $I->amLoggedAs(factory(User::class)->create());
        $I->amOnPage('/');
        $I->click('Ask');

        $question = factory(Post::class)->make([
            'title' => 'My Question Title',
            'description' => 'This is the **question** description.',
            'video_url' => 'https://vimeo.com/135486928'
        ]);

        $I->fillField('title', $question->title);
        $I->fillField('description', $question->description);
        $I->fillField('video_url', $question->video_url);
        $I->click('Ask the question');

        $I->seeCurrentUrlEquals('/questions/my-question-title');

        $I->see('My Question Title');
        $I->see('This is the <strong>question</strong> description.');

        $I->seeRecord('posts', [
            'title' => 'My Question Title',
            'video_url' => 'https://vimeo.com/135486928'
        ]);
    }
}
