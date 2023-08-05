<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGpsRequest extends FormRequest
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
                'pathId' => ['required'],
                'bicycleId' => ['required'],
                'gpsPointsLang' => ['required'],
                'gpsPointsLong' => ['required'],
            ];
        } else {
            return [
                'pathId' => ['sometimes','required'],
                'bicycleId' => ['sometimes','required'],
                'gpsPointsLang' => ['sometimes','required'],
                'gpsPointsLong' => ['sometimes','required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $data = [
            'path_id' => $this->pathId ? $this->pathId : null,
            'bicycle_id' => $this->bicycleId ? $this->bicycleId : null,
            'gps_points_lang' => $this->gpsPointsLang ? $this->gpsPointsLang : null,
            'gps_points_long' => $this->gpsPointsLong ? $this->gpsPointsLong : null,
        ];

        // Remove properties with null values
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $this->merge($data);
    }
}
