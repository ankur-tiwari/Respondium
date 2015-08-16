<?php

namespace App\Mailers;

use App\Mailers\Contracts\Mailable;

class UserMailer extends Mailer
{
	public function sendWelcomeEmailTo(Mailable $user)
	{
		$view = 'emails.users.welcome';
		$subject = 'Welcome to our site!';

		$this->sendTo($user, $view, $subject, [
			'name' => $user->getName()
		]);
	}
}