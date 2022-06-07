<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMailRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'email' => 'required|email',
            'message' => 'required|max:2000',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
    }

    public function messages(){

        return[
            'name.max'=>'The name should be maximum 30 characters',
            'name.required' =>'The name field is required',
            'g-recaptcha-response.required' => 'Please confirm you are not a robot',
            'message.required' => 'The message field is required', 
            'message.max' => 'The message should be maximum 2000 characters',
        ];
    }
}
