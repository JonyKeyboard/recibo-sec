<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FiliadoFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:2',
            'cpf' => ['required', 'string', Rule::unique('filiados')->ignore($this->id)],
            //'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user),


        ];
    }

    public function messages(){
        return [
            'required' => 'Campo :attribute é obrigatório',
            'nome.min' => 'Campo :attribute requer o mínimo de 2 caracteres',
            'cpf.unique' => 'O :attribute informado já está cadastrado'
        ];
    }
}
