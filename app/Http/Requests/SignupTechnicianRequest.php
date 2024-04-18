<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupTechnicianRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','min:3','max:20'],
            'mobile' => ['required','min:10','max:16','unique:users,mobile'],
            'email' => ['required','email','unique:users,email'],
            'password' =>  ['required','min:6','max:15'],
            'city' => ['required','min:3','max:10'],
            'bank_name' => ['required','min:4','max:10'],
            'number_of_statement' => ['required','min:6','max:25'],
            'public_service' => ['required','exists:public_services,id'],
            'sub_service' => ['required','exists:sub_services,id'],
            'location' => ['required'],
            'image' => ['required','mimes:png,jpg,jpeg','max:2048'],
            'icon' => ['required','mimes:png,jpg,jpeg','max:2048'],

        ];
    }
}
