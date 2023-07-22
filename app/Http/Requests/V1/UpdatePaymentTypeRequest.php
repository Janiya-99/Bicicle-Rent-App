<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentTypeRequest extends FormRequest
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
                'payentId' => ['required'],
                'paymentType' => ['required'],
                'description' => ['required']
            ];
        } else {
            return [
                'payentId' => ['sometimes', 'required'],
                'paymentType' => ['sometimes', 'required'],
                'description' => ['sometimes', 'required']
            ];
        }
    }

    protected function prepareForValidation()
    {
        $data = [
            'payment_id' => $this->paymentId ? $this->paymentId :null,
            'payment_type' => $this->paymentType ? $this->paymentType : null
        ];

        // Remove properties with null values
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $this->merge($data);
    }
}
