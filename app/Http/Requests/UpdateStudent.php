<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudent extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required|date',
            'index' => 'required|unique:students',
            'course' => 'required|numeric',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator)
        {
            return response()->json(['success' => false, 'error'=>$validator->messages()]);
        });
    }
}
