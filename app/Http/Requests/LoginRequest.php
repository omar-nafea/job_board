<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function rules(): array
  {
    return [
      'email' => 'bail|required|string|email',
      'password' => 'bail|required|string',
    ];
  }
}
