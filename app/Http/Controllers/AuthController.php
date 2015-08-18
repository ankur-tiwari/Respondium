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
    protected $userRepo;

    protected $auth;

	public function __construct(UserRepository $repo, Guard $auth)
	{
        $this->middleware(Authenticate::class, [
            'only' => 'show'
        ]);

        $this->middleware(RedirectIfAuthenticated::class, [
            'except' => ['logout', 'show']
        ]);

        $this->userRepo = $repo;

        $this->auth = $auth;
	}

    public function create()
    {
    	return view('auth.create')
            ->with([
                'title' => 'Sign In',
                'page'  => 'Sign In'
            ]);
    }

    public function store(SignInRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'confirmed' => 1
        ];

        if ($this->auth->attempt($credentials))
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
        $user = $this->auth->user();

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
    	$this->auth->logout();

        Alert::success('You have successfully logged out!');

    	return redirect('/signin');
    }

    public function confirm($code)
    {
        if ($user = $this->userRepo->confirmationCodeIsValid($code)) {
            $this->auth->login($user);

            $this->userRepo->nullOutTheConfirmationCode($this->auth->user()->id);

            $this->userRepo->confirmEmail($this->auth->user()->id);

            Alert::success('Your email has been confirmed and you are logged in!', 'Welcome!');

            return redirect('/');
        }

        return redirect('/');
    }

    protected function processUserInformationFrom($service)
    {
        $user = Socialite::with($service)->user();

        return $this->userRepo->getOrCreate($user);
    }

    protected function logTheUserInBy($service)
    {
        $this->processUserInformationFrom($service);

        Alert::success('You have successfully signed in!');

        return redirect('/');
    }
}
