<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecentActivityRequest extends FormRequest
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
                'userId' => ['required'],
                'pathId' => ['required'],
                'stationId' => ['required'],
                'bicycleId' => ['required'],
                'paymentTypeId' => ['required'],
                'date' => ['required'],
                'startTime' => ['required'],
                'endTime' => ['required']
            ];
        } else {
            return [
                'userId' => ['sometimes', 'required'],
                'pathId' => ['sometimes', 'required'],
                'stationId' => ['sometimes', 'required'],
                'bicycleId' => ['sometimes', 'required'],
                'paymentTypeId' => ['sometimes', 'required'],
                'date' => ['sometimes', 'required'],
                'startTime' => ['sometimes', 'required'],
                'endTime' => ['sometimes', 'required']
            ];
        }
    }

    protected function prepareForValidation()
    {
        $data = [
            'user_id' => $this->userId ? $this->userId : null,
            'path_id' => $this->pathId ? $this->pathId : null,
            'station_id' => $this->stationId ? $this->stationId : null,
            'bicycle_id' => $this->bicycleId ? $this->bicycleId : null,
            'payment_type_id' => $this->paymentTypeId ? $this->paymentTypeId : null,
            'start_time' => $this->startTime ? $this->startTime : null,
            'end_time' => $this->endTime ? $this->endTime : null
        ];

        // Remove properties with null values
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $this->merge($data);
    }
}
