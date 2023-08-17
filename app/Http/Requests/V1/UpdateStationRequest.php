<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStationRequest extends FormRequest
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
                'name' => ['required'],
                'lang' => ['required'],
                'long' => ['required'],
                'description' => ['required'],
                'isOpen' => ['required'],
                'addressLine1' => ['required'],
                'addressLine2' => ['required'],
                'addressLine3' => ['required'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required'],
                'lang' => ['sometimes', 'required'],
                'long' => ['sometimes', 'required'],
                'description' => ['sometimes', 'required'],
                'isOpen' => ['sometimes', 'required'],
                'addressLine1' => ['sometimes', 'required'],
                'addressLine2' => ['sometimes', 'required'],
                'addressLine3' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $data = [
            'is_open' => $this->isOpen ?  $this->isOpen : null,
            'address_line_1' => $this->addressLine1 ? $this->addressLine1 : null,
            'address_line_1' => $this->addressLine2 ? $this->addressLine2 : null,
            'address_line_1' => $this->addressLine3 ? $this->addressLine3 : null
        ];

        // Remove properties with null values
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $this->merge($data);
    }
}
