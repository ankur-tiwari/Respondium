<?php
use \SeleniumTester;

class LikeCest
{
    public function _before(SeleniumTester $I)
    {
    }

    public function _after(SeleniumTester $I)
    {
    }

    // tests
    public function likesTheQuestion(SeleniumTester $I)
    {
        $this->signUp($I);

        $question = $this->askANewQuestion($I);

        $I->click('AnswersVid');
        $I->seeCurrentUrlEquals('/');

        $I->see($question['title']);
        $I->click($question['title']);

        $I->click('.fa.fa-thumbs-o-up');
    }

    protected function signUp($I, $name='John Doe', $email='john@example.com', $password='secret')
    {
        $I->amOnPage('/');
        $I->click('Sign up');
        $I->fillField('name', $name);
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->click('Sign Up');
        $I->seeCurrentUrlEquals('/');
        $I->see('You are successfully registered as a new user!');
    }

    protected function askANewQuestion($I, $title='a question by john@example.com', $description='Lorem ipsum dolor sit amet.', $tags=['html', 'css'])
    {
        $I->click('Ask');
        $I->see('Ask a question');
        $I->fillField('title', $title);
        $I->fillField('description', $description);
        $I->click('html');
        $I->selectOption('select', $tags);
        $I->click('Ask the question');
        $I->see('Your question was posted successfully.');

        return [
            'title' => $title,
            'description' => $description
        ];
    }
}
