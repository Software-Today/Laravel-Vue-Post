<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            [
                'title' => 'required',
                'category_id' => 'required',
                'tag' => 'required',
                'status' => 'required',
                'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            ], [
                'image' => 'File must be an image of jpeg,png,gif',
            ]
        ];
    }
}
