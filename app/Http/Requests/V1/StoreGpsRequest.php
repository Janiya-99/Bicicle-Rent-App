<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreGpsRequest extends FormRequest
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
            'pathId' => ['required'],
            'bicycleId' => ['required'],
            'gpsPointsLang' => ['required'],
            'gpsPointsLong' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'path_id' => $this->pathId,
            'bicycle_id' => $this->bicycleId,
            'gps_points_lang' => $this->gpsPointsLang,
            'gps_points_long' => $this->gpsPointsLong,
        ]);
    }
}
