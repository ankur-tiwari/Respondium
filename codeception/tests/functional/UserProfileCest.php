<?php
use App\User;
use \FunctionalTester;

class UserProfileCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function it_displays_the_user_profile_publicly(FunctionalTester $I)
    {
        $I->am('a guest');
        $I->wantTo('check somebody\'s user profile');

        $user = factory(User::class)->create();

        $I->amOnPage('/user/' . $user->id . '/profile');
        $I->see($user->name);
    }

    public function it_allows_an_authenticated_user_to_update_his_bio(FunctionalTester $I)
    {
        $I->am('a registered user');
        $I->wantTo('change my bio from my profile page.');
        $me = factory(User::class)->create();
        $I->amLoggedAs($me);

        $I->amOnPage('/user/' . $me->id . '/profile');
        $I->click('Edit your profile');
        $I->seeCurrentUrlEquals('/profile/edit');
        $I->see($me->name);
        $I->see($me->bio);
        $I->fillField('name', 'Johnny Bravo');
        $I->fillField('bio', 'My updated bio');
        $I->click('Save');
        $I->seeCurrentUrlEquals('/user/' . $me->id . '/profile');
        $I->see('Your profile has been updated.');
        $I->see('Johnny Bravo');
        $I->see('My updated bio');

        $I->seeRecord('users', [
            'id' => $me->id,
            'name' => 'Johnny Bravo',
            'bio' => 'My updated bio'
        ]);
    }
}
