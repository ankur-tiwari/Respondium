<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NavItemTest extends TestCase
{
	public function testItGeneratesHtmlForNavItem()
	{
		$result = nav_item('Home', '/', 'Home');
		$this->assertEquals($result, '<li class="active"><a href="/">Home</a></li>');

		$result = nav_item('Contact Us', '/contact-us', 'Contact Us');
		$this->assertEquals($result, '<li class="active"><a href="/contact-us">Contact Us</a></li>');
	}

	public function testItDoesNotGiveActiveClassIfCurrentPageIsNotEqual()
	{
		$result = nav_item('Contact Us', '/contact-us', 'Home');
		$this->assertEquals($result, '<li><a href="/contact-us">Contact Us</a></li>');
	}

	public function testItDoesNotGiveActiveClassIfCurrentPageIsNull()
	{
		$result = nav_item('Contact Us', '/contact-us', null);
		$this->assertEquals($result, '<li><a href="/contact-us">Contact Us</a></li>');
	}
}
