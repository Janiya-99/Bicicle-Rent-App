<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeatherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'recentActivityId' => ['required'],
            'windSpeed' => ['required'],
            'temperature' => ['required'],
            'visibility' => ['required'],
            'humidity' => ['required'],
            'weatherStatus' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'recent_activity_id' => $this->recentActivityId,
            'weather_status' => $this->weatherStatus
        ]);
    }
}
