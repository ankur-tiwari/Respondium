<?php

namespace App\Repositories\Eloquent;

use Auth;
use App\User as UserModel;
use App\Repositories\UserInterface;


class User implements UserInterface
{
	public function getForProfile($id)
	{
		$user = UserModel::where('id', $id)->with('posts')->with([
			'answers' => function($query) {
				$query->with('post')->get();
			}
		])->firstOrFail();

		return $user;
	}

	public function getOrCreate($user)
	{
		$user = UserModel::firstEmailOrCreate($user);

		Auth::login($user);

		return $user;
	}
}
