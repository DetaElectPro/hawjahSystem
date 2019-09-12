<?php

namespace App\Http\Requests;

use App\Models\Auth\User\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return User::$rules;

        // return [
        //     'name' => 'required|max:255',
        //     'phone' => 'required|unique:users|max:10',
        //     'password' => 'required|max:30|min:6'
        // ];
    }
}
