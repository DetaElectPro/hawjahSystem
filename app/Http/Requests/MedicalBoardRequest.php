<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalBoardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'registration_number' => "required|max:20",
            'name' => "required|max:20",
            'field' => "required|max:20",
            'registration_date' => "required|max:20",
            'user_id' => "required|max:20",
            'employ_id' => "required|max:20"

        ];
    }
}
