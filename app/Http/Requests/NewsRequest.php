<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title_en' => 'required',
            'title_de' => 'required',
            'description_en' => 'required',
            'description_de' => 'required',
            'content_en' => 'required',
            'content_de' => 'required',
            'picture' => 'required|max:1000|mimes:jpeg,png,jpg'
        ];

        if($this->route()->getName()=='edit-single-news-post'){
            $rules['news_id'] = 'required';
            $rules['picture'] = 'max:1000|mimes:jpeg,png,jpg';
        }

        return $rules;
    }

    public function messages(){
        return [
            'title_en.required' => 'Title(EN) field is required',
            'title_en.required' => 'Title(DE) field is required',
            'picture.mimes' => 'The picture must be PNG, JPG or JPEG',
        ];
    }
}
