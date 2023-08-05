<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreBicycleRequest extends FormRequest
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
            'typeId' => ['required'],
            'stationId' => ['required'],
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
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'type_id' => $this->typeId,
            'station_id' => $this->stationId,
            'status_id' => $this->statusId,
            'qr_code' => $this->qrCode,
            'live_lang' => $this->liveLang,
            'live_long' => $this->liveLong,
            'temp_pin' => $this->tempPin
        ]);
    }
}
