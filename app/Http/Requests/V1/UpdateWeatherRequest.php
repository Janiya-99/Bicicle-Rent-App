<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeatherRequest extends FormRequest
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
                
            ];
        } else {
            return [
                'googleId' => ['sometimes', 'required'],
                'firstName' => ['sometimes', 'required'],
                'lastName' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email'],
                'dateOfBirth' => ['sometimes', 'required'],
                'nic' => ['sometimes', 'required'],
                'licenceId' => ['sometimes', 'required'],
                'bloodGroup' => ['sometimes', 'required'],
                'licenseIssueDate' => ['sometimes', 'required'],
                'licenseExpireDate' => ['sometimes', 'required'],
                'points' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $data = [
            'google_id' => $this->googleId ? $this->googleId : null,
            'first_name' => $this->firstName ? $this->firstName : null,
            'last_name' => $this->lastName ? $this->lastName : null,
            'date_of_birth' => $this->dateOfBirth ? $this->dateOfBirth : null,
            'licence_id' => $this->licenceId ? $this->licenceId : null,
            'blood_group' => $this->bloodGroup ? $this->bloodGroup : null,
            'license_issue_date' => $this->licenseIssueDate ? $this->licenseIssueDate : null,
            'license_expire_date' => $this->licenseExpireDate ? $this->licenseExpireDate : null,
        ];

        // Remove properties with null values
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $this->merge($data);
    }
}
