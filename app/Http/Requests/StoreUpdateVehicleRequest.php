<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVehicleRequest extends FormRequest
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
        $id = $this->segment(3);

        return [
            'brand'     => 'required|min:2|max:255',
            'model'     => 'required|min:2|max:255',
            'version'   => 'nullable|min:2|max:255',
            'plate'     => "required|min:8|max:8|unique:vehicles,plate,{$id},id",
        ];
    }

    public function messages()
    {
        return [
            'required' => 'o campo :attribute é obrigatório',
            'min'       => 'o campo :attribute precisa ter pelo menos :min caracteres',
            'max'       => 'o campo :attribute deve ser menor que :max caracteres',
            'plate.min' => 'O campo placa precisa ter 7 caracteres',
            'plate.max' => 'O campo placa precisa ter 7 caracteres',
            'plate.unique' => 'placa já cadastrada no sistema',
        ];
    }

    public function attributes()
    {
        return [
            'brand'     => 'marca',
            'model'     => 'modelo',
            'version'   => 'versão/motor',
            'plate'     => 'placa',
        ];
    }
}
