<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMaintenanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'description'  => 'required|min:3|max:9999',
            'scheduled_to' => 'required|date|after_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'o campo :attribute é obrigatório',
            'min'       => 'o campo :attribute precisa ter pelo menos :min caracteres',
            'max'       => 'o campo :attribute deve ser menor que :max caracteres',
            'after_or_equal' => 'a :attribute de agendamento deve ser maior ou igual ao dia de hoje',
        ];
    }

    public function attributes()
    {
        return [
            'description'     => 'descrição',
            'scheduled_to'    => 'data',
        ];
    }
}
