<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FreelancerRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => "required|max:50",
            "surname" => "required|max:50",
            "email" => "required|email",
            'password' => 'required|min:10|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            're_password' => 'required|same:password',
            "message" => "required",
            "jobs" =>'required',
            "subjects" => 'required',
            "languages" => 'required',
            "curriculum_vitae" => 'required',
            "work_samples" => 'required',
            "certificates" =>'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
    }

    public function messages(){

        return [];
    }
}
