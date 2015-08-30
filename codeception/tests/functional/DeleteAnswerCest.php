<?php
use App\Answer;
use App\Question;
use App\User;
use \FunctionalTester;

class DeleteAnswerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    /** @test */
    public function it_allows_the_answerer_to_delete_its_question(FunctionalTester $I)
    {
        $I->am('a user.');
        $I->wantTo('Delete an answer that I posted.');
        $user       = $this->givenIamAUser($I);
        $question   = $this->givenIHaveAQuestion();
        $answer     = $this->whenIPostAnAnswer([
            'user_id' => $user->id,
            'question_id' => $question->id,
        ]);
        $I->amOnPage('/questions/' . $question->slug);
        $I->see('Delete');
        $I->click('Delete');
        $I->see('Your question was removed successfully.');
        $I->dontSeeRecord('answers', $answer->toArray());
    }

    /** @test */
    public function it_does_not_allow_unauthenticated_users_to_delete_a_question($I)
    {
        $user       = $this->givenIamAUser($I);
        $question   = $this->givenIHaveAQuestion();
        $answer     = $this->whenIPostAnAnswer([
            'user_id' => factory(User::class)->create()->id,
            'question_id' => $question->id,
        ]);

        $I->amOnPage('/questions/' . $question->slug);
        $I->dontSee('Delete');
    }

    protected function givenIamAUser($I)
    {
        $I->amLoggedAs($me = factory(User::class)->create());
        return $me;
    }

    protected function givenIHaveAQuestion()
    {
        $question = factory(Question::class)->create([
            'user_id' => factory(User::class)->create()->id
        ]);

        return $question;
    }

    protected function whenIPostAnAnswer($overrides)
    {
        return factory(Answer::class)->create($overrides);
    }
}
