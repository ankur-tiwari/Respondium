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
}
