<?php

namespace App\Listeners;

use App\Events\RegisterUser;
use App\Mailers\UserMailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail
{
    protected $mailer;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  RegisterUser  $event
     * @return void
     */
    public function handle(RegisterUser $event)
    {
        $this->mailer->sendWelcomeEmailTo($event->user);
    }
}
