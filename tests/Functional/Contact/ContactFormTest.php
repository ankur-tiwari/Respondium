<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ContactFormTest extends TestCase
{
	use DatabaseTransactions;

	/** @test */
	public function it_sends_the_contact_message()
	{
		$this   ->visit('/')
				->click('Contact Us')
				->seePageIs('/contact-us')
				->submitContactForm()
				->seePageIs('/contact-us')
				->see('Thank you for contacting us. We will respond as soon as we could!');
	}

	/** @test */
	public function it_automatically_fills_the_email_and_name_fields_if_the_user_is_logged_in()
	{
		Mail::pretend(true);

		$user = $this->registeredUser();

		$this
				->actingAs($user)
				->visit('/')
				->click('Contact Us')
				->seePageIs('/contact-us')
				->see($user->email)
				->see($user->name);
	}
}
