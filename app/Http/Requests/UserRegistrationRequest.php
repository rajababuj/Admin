<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRegistrationRequest extends FormRequest
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
            'email' => 'required','email',
            'password' => 'required|min:5',
            're_pass' => 'required|min:5|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'This name field is required.',
            'email.required' => 'This email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'A user with this email address already exists.',
            'password.required' => 'This password field is required.',
            'password.min' => 'The password must be at least 9 characters.',
            're_pass.required' => 'This re-password field is required.',
            're_pass.same' => 'The re-password must match the password.',
            'agree-term.accepted' => 'You must agree to the Terms of Service.',
        ];
    }
}
