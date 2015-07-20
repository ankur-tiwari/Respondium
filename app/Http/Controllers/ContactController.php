<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use App\Jobs\SendContactFormEmail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
	public function form()
	{
		return view('contact.form');
	}

	public function send(ContactRequest $request)
	{
		$this->dispatch(
			new SendContactFormEmail($request->email, $request->name, $request->subject, $request->message)
		);

		return redirect()->back()->with('flash_message', 'Thank you for contacting us. We will respond as soon as we could!');
	}
}
