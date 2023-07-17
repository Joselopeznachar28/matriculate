<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LapsosSchoolRequest extends FormRequest
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
            'init' => 'required|unique:lapso_schools,init',
            'end'  => 'required|unique:lapso_schools,end',
        ];
    }

    public function messages()
    {
        return [
            'init.unique' => 'Ya existe un lapso que inicio en esta fecha',
            'end.unique' => 'Ya existe un lapso que culmino en esta fecha',
        ];
    }
}
