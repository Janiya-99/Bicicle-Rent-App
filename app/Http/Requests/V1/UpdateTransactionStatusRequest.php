<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionStatusRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'transactionStatus' => ['required']
            ];
        } else {
            return [

                'transactionStatus' => ['sometimes', 'required']
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'transaction_status' => $this->transactionStatus
        ]);
    }
}