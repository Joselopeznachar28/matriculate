<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicPeriodRequest extends FormRequest
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
            'name' => 'unique:academic_periods,name',
            'init' => 'unique:academic_periods,init',
            'end'  => 'unique:academic_periods,end',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Ya existe un periodo academico con este nombre',
            'init.unique' => 'Ya existe un periodo academico que inicio en esta fecha',
            'end.unique' => 'Ya existe un periodo academico que culmino en esta fecha',
        ];
    }
}
