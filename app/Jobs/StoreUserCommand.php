<?php

namespace App\Jobs;

use App\Events\RegisterUser;
use App\Jobs\Job;
use App\Repositories\UserInterface as UserRepository;
use App\User;
use Illuminate\Contracts\Auth\Guard as Auth;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Events\Dispatcher;

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

    public function handle(Dispatcher $event, Auth $auth, UserRepository $userRepo)
    {
        $user = $userRepo->createNew([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'confirmed' => '0',
            'confirmation_code' => md5(uniqid(rand(), true)),
        ]);

        $event->fire(
            new RegisterUser($user)
        );

        return $user;
    }
}
