<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatenotificationRequest extends FormRequest
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
                'description' => ['required'],
                'title' => ['required'],
                'date' => ['required'],
                'time' => ['required']
            ];
        } else {
            return [
                'description' => ['sometimes','required'],
                'title' => ['sometimes','required'],
                'date' => ['sometimes','required'],
                'time' => ['sometimes','required']
            ];
        }
    }
}
