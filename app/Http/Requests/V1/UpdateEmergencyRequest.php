<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmergencyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'bicycleId' => ['required'],
                'emegencyStatusId' => ['required'],
                'lang' => ['required'],
                'long' => ['required'],
                'date' => ['required'],
                'time' => ['required'],
                'description' => ['required']
            ];
        } else {
            return [
                'bicycleId' => ['sometimes','required'],
                'emegencyStatusId' => ['sometimes','required'],
                'lang' => ['sometimes','required'],
                'long' => ['sometimes','required'],
                'date' => ['sometimes','required'],
                'time' => ['sometimes','required'],
                'description' => ['sometimes','required']
            ];
        }
    }

    protected function prepareForValidation()
    {
        $data = [
            'bicycle_id' => $this->bicycle_id ? $this->bicycle_id : null,
            'emergency_status_id' => $this->emegencyStatusId ? $this->emegencyStatusId : null
        ];

        // Remove properties with null values
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $this->merge($data);
    }
}
