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
            'inscription_number' => 'required|unique:student_records,inscription_number',
            'pattern_identification' => 'min:8|max:8',
            'pattern_phone' => 'min:11|max:11',
        ];
    }

    public function messages()
    {
        return [
            'inscription_number.unique' => 'Ya existe este numero de inscripcion',
            'pattern_identification.min' => 'El numero de identificacion debe tener minimo 8 digitos',
            'pattern_identification.max' => 'El numero de identificacion debe tener maximo 8 digitos',
            'pattern_phone.min' => 'El numero de telefono debe tener minimo 11 digitos',
            'pattern_phone.max' => 'El numero de telefono debe tener maximo 11 digitos',
        ];
    }
}
