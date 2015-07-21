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
use App\Http\Middleware\RedirectIfNotAdmin;
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

        $this->middleware(RedirectIfNotAdmin::class, [
            'only' => ['index', 'edit', 'update']
        ]);
	}

    public function index(UserRepository $repo)
    {
        $users = $repo->getAllForDashboard();

        return view('users.index', compact('users'));
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

        return redirect('/')->with('flash_message', 'You are successfully registered as a new user!');
    }

    public function edit($id, UserRepository $repo)
    {
        $user = $repo->getOne($id);

        return view('users.edit', compact('user'));
    }

    public function update($id, UserRepository $repo, Request $request)
    {
        $user = $repo->updateUser($id, $request->only('email', 'name'));

        return redirect('/dashboard/users/'. $id . '/edit')->with('flash_message', 'User Saved!');
    }

    public function destroy($id, UserRepository $repo)
    {
        $repo->deleteUser($id);
    }

    public function profile(UserRepository $repo)
    {
        $user = $repo->getForProfile(Auth::user()->id);

        return view('users.profile', compact('user'));
    }
}
