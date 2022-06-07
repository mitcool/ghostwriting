<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Varidators\Recaptcha;

class LoginRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
    }
}
