<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
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
            'inputs' => 'required|array|min:1',
            'inputs.*.name' => 'required|string',
            'inputs.*.email' => 'required|email|unique:workers,email',
            'inputs.*.role' => 'required|string',
        ];
        // return [
            
        //     'name' => 'required|string',
        //     'email' => 'required|email',
        //     'role' => 'required|string',
        // ];
    }
   
}
