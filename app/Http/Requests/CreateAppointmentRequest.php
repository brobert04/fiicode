<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAppointmentRequest extends FormRequest
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
            'patient_id' => 'required|exists:patients,id',
            'start' => 'required|date',
            'end' => 'required|date',
            'title' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(){
        return [
            'patient_id.required' => 'Patient is required',
            'patient_id.exists' => 'Patient does not exist',
            'start.required' => 'Start date is required',
            'start.date' => 'Start date is not a valid date',
            'end.required' => 'End date is required',
            'end.date' => 'End date is not a valid date',
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
        ];
    }
}
