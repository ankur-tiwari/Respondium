<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\StoreUserRequest;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Repositories\Eloquent\User as UserRepository;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware(RedirectIfAuthenticated::class, [
			'only' => 'create',
		]);

        $this->middleware(Authenticate::class, [
            'only' => 'profile'
        ]);
	}

    public function create()
    {
    	return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
    	$user = new User();

    	$user->name = $request->name;

        $user->email = $request->email;

        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);

        return redirect('/');
    }

    public function rawShow($id)
    {
        $user = User::findOrFail($id);

        return $user;
    }

    public function profile(UserRepository $repo)
    {
        $user = $repo->getForProfile(Auth::user()->id);

        return view('users.profile', compact('user'));
    }

}
