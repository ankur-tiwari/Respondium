<?php

use App\Question;
use App\User;
use \FunctionalTester;

class EditQuestionCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    /** @test */
    public function it_enables_the_user_to_edit_the_question(FunctionalTester $I)
    {
        $I->am('a site user');
        $I->wantTo('update my existing question');

        $user = factory(User::class)->create();
        $question = factory(Question::class)->create([
            'user_id' => $user->id
        ]);

        $I->amLoggedAs($user);
        $I->amOnPage('/');
        $I->click($question->title);
        $I->seeCurrentUrlEquals('/questions/' . $question->slug);
        $I->click('Edit');
        $I->seeCurrentUrlEquals('/questions/' . $question->slug . '/edit');
        $I->fillField('title', 'My Updated Title');
        $I->fillField('description', 'My Updated Description');
        $I->click('Save');

        $I->seeCurrentUrlEquals('/questions/' . $question->slug);
        $I->see('You have successfully updated your question');
        $I->see('My Updated Title');

        $I->seeRecord('questions', [
            'id' => $question->id,
            'user_id' => $user->id,
            'title' => 'My Updated Title',
            'description' => 'My Updated Description'
        ]);
    }

    public function it_does_not_enable_unauthorized_users_to_update_the_question(FunctionalTester $I)
    {
        $I->am('a site user');
        $I->wantTo('update someone\'s existing question');

        $user = factory(User::class)->create();
        $unAuthorizedUser = factory(User::class)->create();
        $question = factory(Question::class)->create([
            'user_id' => $user->id
        ]);

        $I->amLoggedAs($unAuthorizedUser);
        $I->amOnPage('/');
        $I->click($question->title);
        $I->seeCurrentUrlEquals('/questions/' . $question->slug);
        $I->amOnPage('/questions/' . $question->slug . '/edit');
        $I->seeCurrentUrlEquals('/questions/' . $question->slug);
        $I->see('You are not authorized to update this question');
    }
}
