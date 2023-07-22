<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecentActivityRequest extends FormRequest
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
            'userId' => ['required'],
            'pathId' => ['required'],
            'stationId' => ['required'],
            'bicycleId' => ['required'],
            'paymentTypeId' => ['required'],
            'date' => ['required'],
            'startTime' => ['required'],
            'endTime' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId,
            'path_id' => $this->pathId,
            'station_id' => $this->stationId,
            'bicycle_id' => $this->bicycleId,
            'payment_type_id' => $this->paymentTypeId,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime
        ]);
    }
}
