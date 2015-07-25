<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UsersTest extends TestCase
{
	use DatabaseTransactions;

	/** @test */
	public function it_signs_up_correctly()
	{
		$user = $this->signUp();

		$this->see('You are successfully registered as a new user!')
			 ->seeInDatabase('users', ['email' => $user['email']])
			 ->assertTrue(Auth::check());
	}

	/** @test */
	public function it_authenticates_if_corrent_credentials_are_provided()
	{
		$this->signIn();

		$this->assertTrue(Auth::check());
	}

	/** @test */
	public function it_signs_out_correctly()
	{
		$this->signOut()->assertFalse(Auth::check());
	}

	/** @test */
	public function it_allows_password_reset()
	{
		$user = $this->registeredUser();

		$this->visit('/signin')
			 ->click('Forgot your password?')
			 ->seePageIs('/password/email')
			 ->type($user->email, 'email')
			 ->press('Send Password Reset Link')
			 ->seePageIs('/password/email')
			 ->see('We have e-mailed your password reset link!');
	}
}
