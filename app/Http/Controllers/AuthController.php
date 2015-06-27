<?php

namespace App\Http\Controllers;


use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Requests\SignInRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{

	public function __construct()
	{
		$this->middleware(RedirectIfAuthenticated::class, [
			'except' => 'logout'
		]);
	}

    public function create()
    {
    	return view('auth.create');
    }

    public function store(SignInRequest $request)
    {
    	$credentials = [
    		'email' 	=> $request->email,
    		'password'	=> $request->password
    	];

    	if (Auth::attempt($credentials))
    	{
    		if (Auth::user()->admin == '1')
    		{
    			return redirect('/dashboard');
    		} else {
                return redirect('/');
            }
    	}
    	else
    	{
    		return redirect('/signin')->with('flash_message', 'The username or password is incorrect!');
    	}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/signin');
    }
}
