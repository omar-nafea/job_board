<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   public function rules(): array
    {
        return [
            'comment' => 'required',
            'name' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'comment.required' => '*The comment is required.',
            'name.required' => '*The name is required.',
        ];
    }
}

