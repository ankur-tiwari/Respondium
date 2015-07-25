<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AllowedWebsitesTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();
	}

	/** @test */
	public function it_fails_if_the_input_is_invalid()
	{
		$validation = Validator::make([
			'website_url' => 'foo'
		], [
			'website_url' => ['allowed_websites:www.youtube.com']
		]);

		$this->assertTrue($validation->fails());
	}

	/** @test */
	public function it_passes_if_the_input_is_valid()
	{
		$validation = Validator::make([
			'website_url' => 'http://www.youtube.com'
		], [
			'website_url' => ['allowed_websites:www.youtube.com']
		]);

		$this->assertFalse($validation->fails());
	}
}
