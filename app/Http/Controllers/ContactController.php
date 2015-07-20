<?php

namespace App\Http\Controllers;

use Mail;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
	public function form()
	{
		return view('contact.form');
	}

	public function send(ContactRequest $request)
	{
		Mail::raw('Hello World! This is a simple raw email.', function ($message) {
		    $message->from('no-reply@answersvidsupport.com', 'Rana Faiz Ahmad');

		    $message->to('iamfaizahmed123@gmail.com');
		});
	}
}
