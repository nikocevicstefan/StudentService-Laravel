<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCourse extends FormRequest
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
            'name' => 'required|max:255|unique:courses'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
                return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        });
    }
}
