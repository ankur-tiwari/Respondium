<?php

namespace App\Http\Controllers;

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
            return redirect('/')->with('flash_message', 'You have successfully signed in!');
        } else {
            return redirect()->back()->with('flash_message', 'The username or password is incorrect!');
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
