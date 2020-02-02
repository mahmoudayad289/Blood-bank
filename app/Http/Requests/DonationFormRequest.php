<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationFormRequest extends FormRequest
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
            'name' => 'required',
            'age' => 'required|numeric',
            'number_of_bags' => 'required|numeric',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'blood_type_id' => 'required|exists:blood_types,id',
            'city_id' => 'required|exists:cities,id',
            'client_id' => '',
            'number' => 'required',
            'message' => 'required',
        ];
    }
}
