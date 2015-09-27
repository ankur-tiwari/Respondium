<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Mailers\SupportMailer;
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

    public function handle(SupportMailer $mailer)
    {
        $mailer->sendContactMessage([
            'email'         => $this->email,
            'name'          => $this->name,
            'subject'       => $this->subject,
            'bodyMessage'   => $this->message,
        ]);
    }
}
