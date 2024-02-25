<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'season' => 'required|string|max:255',
            'participants' => 'required|string|max:255',
            'budget' => 'required|string|max:255',
            'stay_duration' => 'required|string|max:255',
            'content' => 'required|string',
            'is_public' => 'required|boolean',
            'image_path_1' => 'nullable|string|max:255',
            'image_path_2' => 'nullable|string|max:255',
            'image_path_3' => 'nullable|string|max:255',
        ];
    
        for ($i = 1; $i <= 20; $i++) {
            $rules["place_visited_$i"] = 'nullable|string|max:255';
            $rules["impressions_$i"] = 'nullable|string';
        }
    
        return $rules;
    }
}
