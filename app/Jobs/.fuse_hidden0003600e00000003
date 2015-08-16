<?php

namespace App\Jobs;

use App\User;
use App\Jobs\Job;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Auth\Guard as Auth;
use App\Events\RegisterUser;

class StoreUserCommand extends Job implements SelfHandling
{
    public $name;

    public $email;

    public $password;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;

        $this->email = $email;

        $this->password = $password;
    }

    public function handle(Dispatcher $event, Auth $auth)
    {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        $event->fire(
            new RegisterUser($user)
        );

        $auth->login($user);

        return $user;
    }
}
