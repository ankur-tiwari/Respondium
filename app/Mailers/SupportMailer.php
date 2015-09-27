<?php

namespace App\Mailers;

use App\Mailers\Contracts\Mailable;

class SupportMailer extends Mailer
{
	public function sendContactMessage(array $data)
	{
		$view = 'emails.contact';
		$subject = 'Message From a Respondium User!';

		$this->sendToMe($view, $subject, $data);
	}
}