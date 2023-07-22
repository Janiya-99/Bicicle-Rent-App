<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePathRequest extends FormRequest
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
                'startLong' => ['required'],
                'startLang' => ['required'],
                'endLong' => ['required'],
                'endLang' => ['required'],
                'startLocation' => ['required'],
                'endLocation' => ['required'],
                'distance' => ['required'],
            ];
        } else {
            return [
                'bicycleId' => ['sometimes', 'required'],
                'startLong' => ['sometimes', 'required'],
                'startLang' => ['sometimes', 'required'],
                'endLong' => ['sometimes', 'required'],
                'endLang' => ['sometimes', 'required'],
                'startLocation' => ['sometimes', 'required'],
                'endLocation' => ['sometimes', 'required'],
                'distance' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $data = [
            'bicycle_id' => $this->bicycleId ? $this->bicycleId : null,
            'start_long' => $this->startLong ? $this->startLong : null,
            'start_lang' => $this->startLang ? $this->startLang : null,
            'end_long' => $this->endLong ? $this->endLong : null,
            'end_lang' => $this->endLang ? $this->endLang :null,
            'start_location' => $this->startLocation ? $this->startLocation : null,
            'end_location' => $this->endLocation ? $this->endLocation : null,
        ];

        // Remove properties with null values
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $this->merge($data);
    }
}
