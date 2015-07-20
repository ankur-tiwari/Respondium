<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Mail\Mailer;

class SendContactFormEmail extends Job implements SelfHandling
{
    public $email;

    public $name;

    public $subject;

    public $message;

    public function __construct($email, $name, $subject, $message)
    {
        $this->email = $email;

        $this->name = $name;

        $this->subject = $subject;

        $this->message = $message;
    }

    public function handle(Mailer $mailer)
    {
        $mailer->queue('emails.contact', [
            'email' => $this->email,
            'name' => $this->name,
            'subject' => $this->subject,
            'bodyMessage' => $this->message,
        ], function($message) {
            $message->to('iamfaizahmed123@gmail.com', 'Rana Faiz Ahmad');

            $message->subject('AnswersVid: Contact Form Message');
        });
    }
}
