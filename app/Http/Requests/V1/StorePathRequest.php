<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePathRequest extends FormRequest
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
            'bicycleId' => ['required'],
            'startLong' => ['required'],
            'startLang' => ['required'],
            'endLong' => ['required'],
            'endLang' => ['required'],
            'startLocation' => ['required'],
            'endLocation' => ['required'],
            'distance' => ['required'],

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'bicycle_id' => $this->bicycleId,
            'start_long' => $this->startLong,
            'start_lang' => $this->startLang,
            'end_long' => $this->endLong,
            'end_lang' => $this->endLang,
            'start_location' => $this->startLocation,
            'end_location' => $this->endLocation,
        ]);
    }
}
