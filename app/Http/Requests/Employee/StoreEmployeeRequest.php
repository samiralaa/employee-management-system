<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $this->employee, // استخدم $this->employee عند التعديل
            'department_id' => 'nullable|exists:departments,id',
            'salary' => 'required|numeric',
            'password' => 'nullable|string|min:8|confirmed', // إذا كنت لا تريد التحقق عند التعديل، يمكنك جعله nullable
            'is_manager' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'manager_id' => 'nullable|exists:employees,id',
        ];
    }
}
