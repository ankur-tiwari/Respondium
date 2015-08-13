<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests;
use App\Http\Requests\EditProfileRequest;
use App\Repositories\UserInterface as UserRepo;
use App\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
	protected $userRepo;

	public function __construct(UserRepo $userRepo)
	{
		$this->middleware(Authenticate::class, [
			'except' => 'show'
		]);

		$this->userRepo = $userRepo;
	}

	public function show($id)
	{
		$user = $this->userRepo->getForProfile($id);

		return view('users.profiles.show', compact('user'));
	}

	public function edit()
	{
		return view('users.profiles.edit', compact('user'));
	}

	public function store($id, EditProfileRequest $request)
	{
		User::findOrFail($id)->update($request->only('name', 'bio'));

		Alert::success('Your profile has been updated.');

		return redirect('/user/' . $id . '/profile');
	}
}
