<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'keywords'      => 'required',
            'descriptions'  => 'required',
            'title'         => 'required',
            'contents'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'keywords.required'         => 'Lütfen anahtar kelime giriniz.',
            'descriptions.required'     => 'Lütfen açıklama giriniz.',
            'title.required'            => 'Lütfen başlık giriniz.',
            'contents.required'          => 'Lütfen içerik giriniz.',
        ];
    }
}
