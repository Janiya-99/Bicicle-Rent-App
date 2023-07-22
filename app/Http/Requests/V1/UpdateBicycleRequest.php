<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBicycleRequest extends FormRequest
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
                'typeId' => ['required'],
                'station' => ['required'],
                'statusId' => ['required'],
                'qrCode' => ['required'],
                'liveLang' => ['required'],
                'liveLong' => ['required'],
                'tempPin' => ['required'],
                'height' => ['required'],
                'weight' => ['required'],
                'manufactured' => ['required'],
                'gps' => ['required'],
                'recentActivity' => ['required']
            ];
        } else {
            return [
                'bicycleId' => ['sometimes', 'required'],
                'typeId' => ['sometimes', 'required'],
                'station' => ['sometimes', 'required'],
                'statusId' => ['sometimes', 'required'],
                'qrCode' => ['sometimes', 'required'],
                'liveLang' => ['sometimes', 'required'],
                'liveLong' => ['sometimes', 'required'],
                'tempPin' => ['sometimes', 'required'],
                'height' => ['sometimes', 'required'],
                'weight' => ['sometimes', 'required'],
                'manufactured' => ['sometimes', 'required'],
                'gps' => ['sometimes', 'required'],
                'recentActivity' => ['sometimes', 'required']
            ];
        }
    }

    protected function prepareForValidation()
    {
        $data = [
            'bicycle_id' => $this->bicycleId ? $this->bicycleId : null,
            'type_id' => $this->typeId ? $this->typeId : null,
            'station_id' => $this->stationId ? $this->stationId : null,
            'status_id' => $this->statusId ? $this->statusId : null,
            'qr_code' => $this->qrCode ? $this->qrCode : null,
            'live_lang' => $this->liveLang ? $this->liveLang : null,
            'live_long' => $this->liveLong ? $this->liveLong : null,
            'temp_pin' => $this->tempPin ? $this->tempPin : null,
        ];

        // Remove properties with null values
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $this->merge($data);
    }
}
