<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRecordsRequest extends FormRequest
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
        return [
            'inscription_number' => 'required|unique:students,inscription_number',
        ];
    }

    public function messages()
    {
        return [
            'inscription_number.unique' => 'Ya existe este numero de inscripcion',
        ];
    }
}
