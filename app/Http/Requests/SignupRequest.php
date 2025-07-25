<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function rules(): array
  {
    return [
      'name' => 'bail|required|string',
      'email' => 'bail|required|string|email|unique:users',
      'password' => 'bail|required|string|min:8|confirmed'
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'The name is required.',
      'email.required' => 'The email is required.',
      'email.email' => 'The email must be a valid email address.',
      'email.unique' => 'The email has already been taken.',
      'password.required' => 'The password is required.',
      'password.min' => 'The password must be at least 8 characters long.',
      'password.confirmed' => 'The password confirmation does not match.'
    ];
  }

}
