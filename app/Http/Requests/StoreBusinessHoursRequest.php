<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBusinessHoursRequest extends FormRequest
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
        $doctorId = $this->doctor_id;
        $day = $this->day;
        return [
            'doctor_id' => 'required|exists:doctors,id',
            'day' => [
                'required',
                Rule::unique('doctor_hours')->where(function ($query) use ($doctorId, $day) {
                    return $query->where('doctor_id', $doctorId)->where('day', $day);
                })
            ],
            'start_hour' => 'nullable|date_format:H:i',
            'end_hour' => 'nullable|date_format:H:i|after:start_hour',        
        ];
    }
    public function messages(){
        return [
            'day.unique' => 'You already have a record for this day. Please choose another day.',
        ];
}
}
