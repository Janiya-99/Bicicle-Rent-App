<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCardRequest extends FormRequest
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
                'cardNumber' => ['required'],
                'securityNumber' => ['required']
            ];
        } else {
            return [
                'userId' => ['sometimes', 'required'],
                'cardNumber' => ['sometimes', 'required'],
                'securityNumber' => ['sometimes', 'required']
            ];
        }
    }

    protected function prepareForValidation()
    {
        $data = [
            'user_id' => $this->userId ? $this->userId : null,
            'card_number' => $this->cardNumber ? $this->cardNumber : null,
            'security_number' => $this->securityNumber ? $this->securityNumber : null
        ];

        // Remove properties with null values
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $this->merge($data);
    }
}
