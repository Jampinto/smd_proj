<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtenteRequestUpdate extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:3',
            'nutente' => 'required|digits:9',
            'genero' => 'required',
            'email' => 'email',
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'O nome é de preenchimento obrigatório.',
            'genero.required' => 'O género é preenchimento obrigatório.',
            'nutente.required' => 'O n.º de utente é de preenchimento obrigatório.',
            'nutente.digits' => 'O n.º de utente deve conter 9 dígitos.',
            'email.email' => 'O email não é válido.',
            'nome.min' => 'O nome tem de ter no mínimo :min caracteres.',
        ];
    }
}
