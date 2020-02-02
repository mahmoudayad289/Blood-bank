<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingFormRequest extends FormRequest
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
            'app_about' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'f_link' => 'required',
            't_link' => 'required',
            'y_link' => 'required',
            'insta_link' => 'required',
            'whats_number' => 'required|numeric',
            'goole_plus_link' => 'required',
        ];
    }
}

