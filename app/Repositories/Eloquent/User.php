<?php

namespace App\Repositories\Eloquent;

use Auth;
use App\User as UserModel;
use App\Repositories\UserInterface;


class User implements UserInterface
{
	public function getForProfile($id)
	{
		$user = UserModel::where('id', $id)->with('questions')->with([
			'answers' => function($query) {
				$query->with('questions')->get();
			}
		])->firstOrFail();

		return $user;
	}

	public function getAllForDashboard()
	{
		return UserModel::latest()->paginate(10);
	}

	public function getOne($id)
	{
		return UserModel::findOrFail($id);
	}

	public function updateUser($id, $attributes)
	{
		$user = UserModel::findOrFail($id);

		$user->email = $attributes['email'];

		$user->name = $attributes['name'];

		$user->save();

		return $user;
	}

	public function getOrCreate($user)
	{
		$user = UserModel::firstEmailOrCreate($user);

		Auth::login($user);

		return $user;
	}

	public function deleteUser($id)
	{
		return UserModel::findOrFail($id)->delete();
	}

	public function createNew($fields)
	{
        $user = UserModel::create($fields);

        return $user;
	}

    public function confirmationCodeIsValid($code)
    {
        $user = UserModel::where('confirmation_code', $code)->firstOrFail();

        if ($user) {
            return $user;
        }

        return false;
    }

    public function nullOutTheConfirmationCode($userId)
    {
    	$updated = UserModel::findOrFail($userId)->update([
    		'confirmation_code' => null
    	]);

    	return $updated;
    }

    public function confirmEmail($userId)
    {
    	$user = UserModel::findOrFail($userId);

    	$user->confirmed = true;

    	$user->save();

    	return $user;
    }
}
