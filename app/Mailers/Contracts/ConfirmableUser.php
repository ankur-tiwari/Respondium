<?php

namespace App\Mailers\Contracts;

interface ConfirmableUser
{
	public function getConfirmationCode();
}