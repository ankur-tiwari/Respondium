<?php
use \SeleniumTester;

class AskQuestionCest
{
    public function _before(SeleniumTester $I)
    {
    }

    public function _after(SeleniumTester $I)
    {
    }

    // tests
    public function askAQuestion(SeleniumTester $I)
    {
        $I->amOnPage('/');

        $I->click('Sign in');
        $I->fillField('email', 'john@example.com');
        $I->fillField('password', 'secret');
        $I->click('Sign In');

        $I->click('Ask');
        $I->fillField('title', 'My Awesome question');
        $I->fillField('description', 'this is my *awesome* question description');
        $I->selectOption('tags[]', ['html', 'css']);
        $I->click('Ask the question');

        $I->see('Your question was posted successfully.');
        $I->see('My Awesome question');
        $I->see('this is my awesome question description');
    }
}
