<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Jobs\StoreUserCommand;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\StoreUserRequest;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Repositories\UserInterface as UserRepository;

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
        $this->dispatch(
            new StoreUserCommand($request->name, $request->email, $request->password)
        );

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
