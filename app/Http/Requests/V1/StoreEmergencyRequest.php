<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmergencyRequest extends FormRequest
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
        return [
            'bicycleId' => ['required'],
            'emegencyStatusId' => ['required'],
            'lang' => ['required'],
            'long' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'description' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'bicycle_id' => $this->bicycle_id,
            'emergency_status_id' => $this->emegencyStatusId
        ]);
    }
}
