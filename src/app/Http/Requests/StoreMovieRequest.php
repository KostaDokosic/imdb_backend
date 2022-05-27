<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title' => 'required|unique:movies|max:255',
            'description' => 'required',
            'coverImage' => 'required|mimes:jpeg,jpg,png|max:2048',
            'genre_ids' => 'required|array',
        ];
    }
}
