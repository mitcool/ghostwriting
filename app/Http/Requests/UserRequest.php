<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'surname'=>'required|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:10|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'confirm_password' => 'required|same:password',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }

    public function messages(){
        return [
            'name.required' => Session::get('locale')=='de' ? 'Namen fielden required' : 'Name field is required',
            'password.reqex' => 'Passoword should contain at least 10 characters, at least 1 capital letter and so on',   
        ];
    }
}
