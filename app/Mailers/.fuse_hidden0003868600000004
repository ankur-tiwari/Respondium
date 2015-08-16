<?php

namespace App\Mailers;

use Illuminate\Contracts\Mail\MailQueue as Mail;
use App\Mailers\Contracts\Mailable;

abstract class Mailer
{
	protected $mail;

	public function __construct(Mail $mail)
	{
		$this->mail = $mail;
	}

	public function sendTo(Mailable $user, $view, $subject, $data=[])
	{
		$this->mail->queue($view, $data, function ($mail) use ($user, $subject) {
			$mail->to($user->getEmail())->subject($subject);
		});
	}
}