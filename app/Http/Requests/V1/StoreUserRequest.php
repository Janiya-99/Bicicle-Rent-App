<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string => $this->, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'googleId' => ['required'],
            'firstName' => ['required'],
            'lastName' => ['required'],
            'email' => ['required', 'email'],
            'dateOfBirth' => ['required'],
            'nic' => ['required'],
            'licenceId' => ['required'],
            'bloodGroup' => ['required'],
            'licenseIssueDate' => ['required'],
            'licenseExpireDate' => ['required'],
            'points' => ['required'],
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'google_id' => $this->googleId,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'date_of_birth' => $this->dateOfBirth,
            'licence_id' => $this->licenceId,
            'blood_group' => $this->bloodGroup,
            'license_issue_date' => $this->licenseIssueDate,
            'license_expire_date' => $this->licenseExpireDate,
        ]);

    }
}
