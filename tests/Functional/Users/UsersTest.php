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
}
