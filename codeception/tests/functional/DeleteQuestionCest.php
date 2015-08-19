<?php

use App\Question;
use App\User;
use \FunctionalTester;

class DeleteQuestionCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    /** @test */
    public function it_allows_the_owner_to_delete_his_question(FunctionalTester $I)
    {
        $I->am('a user');;
        $I->wantTo('delete a question that I posted');

        $user = factory(User::class)->create();
        $question = factory(Question::class)->create([
            'user_id' => $user->id
        ]);
        $I->amLoggedAs($user);

        $I->amOnPage('/');
        $I->click($question->title);
        $I->seeCurrentUrlEquals('/questions/' . $question->slug);

        $I->click('Delete');

        $I->see('Deleted the question successfully');
        $I->dontSeeRecord('questions', $question->toArray());
    }
}
