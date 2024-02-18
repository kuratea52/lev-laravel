<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'season' => 'required|string|max:255',
            'participants' => 'required|string|max:255',
            'budget' => 'required|string|max:255',
            'stay_duration' => 'required|string|max:255',
            'content' => 'required|string',
            'is_public' => 'required|boolean',
        ];
    }
}
