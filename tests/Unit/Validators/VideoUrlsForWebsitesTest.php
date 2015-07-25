<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class VideoUrlsForWebsitesTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();
	}

	/** @test */
	public function it_passes_if_the_input_is_valid()
	{
		$validation = Validator::make([
			'video_url' => 'http://youtube.com/watch?v=dqw4w9wgxcq'
		], [
			'video_url' => ['video_urls_for_websites:youtube.com']
		]);

		$this->assertFalse($validation->fails());
	}

	/** @test */
	public function it_fails_if_the_input_is_invalid()
	{
		$validation = Validator::make([
			'video_url' => 'http://youtube.com/wrongurl'
		], [
			'video_url' => ['video_urls_for_websites:youtube.com']
		]);

		$this->assertTrue($validation->fails());
	}

	/** @test */
	public function it_works_with_multiple_paramtere()
	{
		$validation = Validator::make([
			'video_url' => 'http://youtube.com/wrongurl'
		], [
			'video_url' => ['video_urls_for_websites:youtube.com,somefalsewebsite.com']
		]);

		$this->assertTrue($validation->fails());
	}

	/** @test */
	public function it_works_with_https_urls()
	{
		$validation = Validator::make([
			'video_url' => 'http://youtube.com/watch?v=dqw4w9wgxcq'
		], [
			'video_url' => ['video_urls_for_websites:youtube.com,somefalsewebsite.com']
		]);

		$this->assertFalse($validation->fails());
	}

}
