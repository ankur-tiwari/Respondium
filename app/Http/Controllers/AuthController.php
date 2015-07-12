<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SocialLoginRequest; use App\Http\Middleware\RedirectIfAuthenticated;
use App\Repositories\UserInterface as UserRepository;

class AuthController extends Controller
{
    private $userRepo;

	public function __construct(UserRepository $repo)
	{
        $this->userRepo = $repo;

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
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if (Auth::attempt($credentials))
        {
            if (Auth::user()->admin == '1')
            {
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/signin')->with('flash_message', 'The username or password is incorrect!');
        }
    }

    public function social(SocialLoginRequest $request)
    {
        return Socialite::driver($request->service)->redirect();
    }

    public function google(UserRepository $repo)
    {
        $this->processUserInformationFrom('google');

        return redirect('/');
    }

    public function facebook()
    {
        $this->processUserInformationFrom('facebook');

        return redirect('/');
    }

    public function github()
    {
        $this->processUserInformationFrom('github');

        return redirect('/');
    }

    public function linkedin()
    {
        $this->processUserInformationFrom('linkedin');

        return redirect('/');
    }

    public function logout()
    {
    	Auth::logout();

    	return redirect('/signin');
    }

    private function processUserInformationFrom($service)
    {
        $user = Socialite::with($service)->user();

        return $this->userRepo->getOrCreate($user);
    }

}
