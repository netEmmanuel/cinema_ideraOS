<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovie extends FormRequest
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
            'movie_title' => 'required|string|max:50',
            'movie_banner' => 'required|string|max:100',
            'start_time' => 'required|date|before:end_time',
            'end_time' => 'required|date|after:start_time',
            'cinema_id' => 'required|int|exists:cinemas,id',
        ];
    }
}
