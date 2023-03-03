<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthFileRequest extends FormRequest
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
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'blood' => 'required|string',
            'allergies' => 'required|string',
            'reason' => 'required',
            'operations' => 'required',
            'medications' => 'required',
            'exercise' => 'required',
            'alcohol' => 'required',
            'caffeine' => 'required',
            'diet' => 'required',
            'date' => 'required'
        ];
    }

    public function messages(){
        return [
            'height.required' => 'Height is required',
            'weight.required' => 'Weight is required',
            'blood.required' => 'Blood type is required',
            'allergies.required' => 'Allergies is required',
            'reason.required' => 'Reason is required',
            'operations.required' => 'Operations is required',
            'medications.required' => 'Medications is required',
            'exercise.required' => 'Exercise is required',
            'alcohol.required' => 'Alcohol is required',
            'caffeine.required' => 'Caffeine is required',
            'diet.required' => 'Diet is required',
            'date.required' => 'Date is required'
        ];
    }
}
