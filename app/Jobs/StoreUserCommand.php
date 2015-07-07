<?php

namespace App\Jobs;

use Auth;
use App\User;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

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

    public function handle()
    {
        $user = new User;

        $user->name = $this->name;

        $user->email = $this->email;

        $user->password = bcrypt($this->password);

        $user->save();

        Auth::login($user);

        return $user;
    }
}
