<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreQuestionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|min:5|unique:posts',
            'description'   => 'required|min:10',
            'video_url'     => 'url|video_urls_for_websites:youtube.com,dailymotion.com,vimeo.com',
        ];
    }
}
