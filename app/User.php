<?php

namespace App;

use App\Mailers\Contracts\Mailable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, Mailable
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'bio'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public static function firstEmailOrCreate($attributes)
    {
        $found = self::where('email', $attributes->email)->first();

        if ($found) {
            return $found;
        } else {
            return self::create([
                'name' => $attributes->name,
                'email'=> $attributes->email
            ]);
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }
}
