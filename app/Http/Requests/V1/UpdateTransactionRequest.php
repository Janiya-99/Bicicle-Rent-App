<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
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
                'amount' => ['required'],
                'transactionStatusId' => ['required']
            ];
        } else {
            return [
                'userId' => ['sometimes', 'required'],
                'amount' => ['sometimes', 'required'],
                'transactionStatusId' => ['sometimes', 'required']
            ];
        }
    }

    protected function prepareForValidation()
    {
        $data = [
            'user_id' => $this->UserId,
            'transaction_status_id' => $this->transactonStatusId
        ];

        // Remove properties with null values
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $this->merge($data);
    }
}
