<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorUpdatePasswordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required|min:8',
            'newpassword' => 'required|min:8',
            'renewpassword' => 'required|min:8|same:newpassword'
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'Current password is required',
            'newpassword.required' => 'New password is required',
            'renewPassword.required' => 'Confirm password is required',
            'renewPassword.same' => 'Confirm password does not match',
        ];
    }
}
