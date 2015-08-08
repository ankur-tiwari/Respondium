<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SocialLoginRequest; use App\Http\Middleware\RedirectIfAuthenticated;
use App\Repositories\UserInterface as UserRepository;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;

class AuthController extends Controller
{
    private $userRepo;

	public function __construct(UserRepository $repo)
	{
        $this->userRepo = $repo;

        $this->middleware(Authenticate::class, [
            'only' => 'show'
        ]);

		$this->middleware(RedirectIfAuthenticated::class, [
			'except' => ['logout', 'show']
		]);
	}

    public function create()
    {
    	return view('auth.create')
                                ->with('title', 'Sign In')
                                ->with('page', 'Sign in');
    }

    public function store(SignInRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password')))
        {
            Alert::success('You have successfully signed in!');

            return redirect()->intended();
        } else {
            Alert::error('The username or password is incorrect!');

            return redirect()->back();
        }
    }

    public function show()
    {
        $user = Auth::user();

        return [
            'id' => $user->id,
            'name' => $user->name
        ];
    }

    public function social(SocialLoginRequest $request)
    {
        return Socialite::driver($request->service)->redirect();
    }

    public function google(UserRepository $repo)
    {
        return $this->logTheUserInBy('google');
    }

    public function facebook()
    {
        return $this->logTheUserInBy('facebook');
    }

    public function github()
    {
        return $this->logTheUserInBy('github');
    }

    public function linkedin()
    {
        return $this->logTheUserInBy('linkedin');
    }

    public function logout()
    {
    	Auth::logout();

        Alert::success('You have successfully logged out!');

    	return redirect('/signin');
    }

    private function processUserInformationFrom($service)
    {
        $user = Socialite::with($service)->user();

        return $this->userRepo->getOrCreate($user);
    }

    private function logTheUserInBy($service)
    {
        $this->processUserInformationFrom($service);

        Alert::success('You have successfully signed in!');

        return redirect('/');
    }
}
