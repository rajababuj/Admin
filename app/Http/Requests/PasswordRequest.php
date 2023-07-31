<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PasswordRequest extends FormRequest
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
    // public function rules()
    // {
    //     return [
    //         'old_password' => 'required|min:8|max:10',
    //         'new_password' => 'required|min:8|max:10',
    //         'confirm_password' => 'required|same:new_password'
    //     ];
    // }
    public function rules(){
        return [
            'old_password.required' => 'Enter your current password',
            'old_password.min' => 'Old password must have at least 8 characters',
            'old_password.max' => 'Old password must not be greater than 30 characters',
            'new_password.required' => 'Enter new password',
            'new_password.min' => 'New password must have at least 8 characters',
            'new_password.max' => 'New password must not be greater than 30 characters',
            'confirm_password.required' => 'Re-enter your new password',
            'confirm_password.same' => 'New password and Confirm new password must match'
        ];
    }

   
}
