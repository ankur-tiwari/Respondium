<?php

namespace App\Http\Controllers;

use Alert;
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
		$pageTitle = 'Contact Us';

		return view('contact.form', [
			'title' => $pageTitle,
			'page' => $pageTitle
		]);
	}

	public function send(ContactRequest $request)
	{
		$this->dispatch(
			new SendContactFormEmail($request->email, $request->name, $request->subject, $request->message)
		);

		Alert::success('Thank you for contacting us. We will respond as soon as we could!');

		return redirect()->back();
	}
}
