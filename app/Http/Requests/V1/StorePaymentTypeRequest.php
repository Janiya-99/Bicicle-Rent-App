<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentTypeRequest extends FormRequest
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
            'payentId' => ['required'],
            'paymentType' => ['required'],
            'description' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'payment_id' => $this->paymentId,
            'payment_type' => $this->paymentType
        ]);
    }
}
