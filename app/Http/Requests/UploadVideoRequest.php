<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UploadVideoRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'video_file'    => 'mimes:mp4',
            'description'   => 'required',
            'post_id'       => 'required|integer'
        ];
    }
}
