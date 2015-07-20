<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
	public function form()
	{
		return view('contact.form');
	}

	public function send(ContactRequest $request)
	{

	}
}
