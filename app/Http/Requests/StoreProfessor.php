<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfessor extends FormRequest
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
            'username' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|unique:users',

            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required|date',
            'office' => 'required',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator)
        {
           return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        });
    }

}
