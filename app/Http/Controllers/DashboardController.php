<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfNotAdmin;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware(Authenticate::class);
		$this->middleware(RedirectIfNotAdmin::class);
	}

	public function home()
	{
		return view('dashboard.home');
	}
}
