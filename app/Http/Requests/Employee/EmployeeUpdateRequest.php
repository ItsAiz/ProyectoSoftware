<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'documentType' => ['required', 'string', 'max:255'],
            'documentNumber' => ['required', 'numeric', 'digits_between:5,20', Rule::unique('employees')->ignore($this->route('employee'))],
            'phoneNumber' => ['required', 'numeric', 'digits_between:10,20', Rule::unique('employees')->ignore($this->route('employee'))],
            'address' => ['required', 'string', 'max:255'],
            'hiringDate' => ['required', 'date', 'max:255'],
            'salary' => ['required', 'numeric', 'digits_between:6,20'],
        ];
    }

}
