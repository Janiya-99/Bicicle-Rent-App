<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreStationRequest extends FormRequest
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
            'name' => ['required'],
            'lang' => ['required'],
            'long' => ['required'],
            'description' => ['required'],
            'isOpen' => ['required'],
            'addressLine1' => ['required'],
            'addressLine2' => ['required'],
            'addressLine3' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
           'is_open' => $this->isOpen,
           'address_line_1' => $this->addressLine1,
           'address_line_1' => $this->addressLine2,
           'address_line_1' => $this->addressLine3
        ]);
    }
}
