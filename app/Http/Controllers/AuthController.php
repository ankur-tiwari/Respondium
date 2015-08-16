<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SocialLoginRequest; use App\Http\Middleware\RedirectIfAuthenticated;
use App\Repositories\UserInterface as UserRepository;
use Illuminate\Container\Container;
use Illuminate\Contracts\Auth\Guard;
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
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'confirmed' => 1
        ];

        if (Auth::attempt($credentials))
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

    public function confirm($code, Guard $auth)
    {
        if ($user = $this->userRepo->confirmationCodeIsValid($code)) {

            $auth->login($user);

            Alert::success('Your email has been confirmed and you are logged in!', 'Welcome!');

            return redirect('/');
        }

        return redirect('/');
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
