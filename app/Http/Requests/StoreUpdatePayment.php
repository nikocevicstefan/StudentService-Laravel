<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePayment extends FormRequest
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
            'student' => 'required|numeric|max:255',
            'description' => 'required',
            'amount'   => 'required'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        });
    }
}
