<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'     => 'required|email',
            'name'      => 'required',
            'subject'   => 'required',
            'message'   => 'required'
        ];
    }
}
