<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequestValid extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => "bail|required|unique:posts,title,{$this->input('id')}",
            'body' => 'required',
            'writer_id' => 'bail|required|exists:writers,id',
            'category' => 'bail|required|integer|exists:categories,id',

        ];
    }
    public function messages(): array
    {
        return [
            'title.unique' => '*The title of the post must be unique.',
            'writer_id.exists' => '*The author of the post must be an existing writer.',
            'title.required' => '*The title of the post is required.',
            'body.required' => '*The content of the post is required.',
        ];
    }
}
