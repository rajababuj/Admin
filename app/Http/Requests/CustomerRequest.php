<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'age' => 'required|digits_between:1,3', 
            'phone' => 'required|max:25',
            'address' => 'required|max:255',
            'image' => 'required|image',
            'gender' => 'required|in:1,2',
            'amount_paid' => 'required',
            'membership_id' => 'required',
            'in' => 'required',
            'out' => 'required'
        ];
    }
}
