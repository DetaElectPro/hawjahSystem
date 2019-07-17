<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//{
//    return false;
//}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'job_title' => 'required|max:255',
            'graduation_date' => 'required',
            'birth_of_date' => 'required',
            'address' => 'required',
            'years_of_experience' => 'required',
            'cv' => 'required',
        ];
    }
}
