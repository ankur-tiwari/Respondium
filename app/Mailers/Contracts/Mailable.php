<?php

namespace App\Mailers\Contracts;

interface Mailable
{
	public function getEmail();

	public function getName();
}