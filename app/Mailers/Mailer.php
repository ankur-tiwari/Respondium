<?php

namespace App\Mailers;

use Illuminate\Contracts\Mail\MailQueue as Mail;
use App\Mailers\Contracts\Mailable;

abstract class Mailer
{
	protected $mail;

	protected $myEmail = 'iamfaizahmed123@gmail.com';

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

	public function sendToMe($view, $subject, $data=[])
	{
		$myEmail = $this->myEmail;

		$this->mail->queue($view, $data, function ($mail) use ($subject, $myEmail) {
			$mail->to($myEmail)->subject($subject);
		});
	}

	public function sendMePlainMessage($message, $subject)
	{
		$myEmail = $this->myEmail;

		$this->mail->raw($message, function($mail) use ($myEmail, $subject) {
			$mail->to($myEmail)->subject($subject);
		});
	}
}