<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'text_usuario' => 'required|email',
            'text_senha' => 'required|min:5|max:20'
        ];
    }

    public function messages(){
        return [
            'text_usuario.required' => 'O usuário é de preenchimento obrigatório.',
            'text_usuario.email' => 'O usuário tem de ser um email válido.',
            'text_senha.required' => 'O campo senha é de preenchimento obrigatório.',
            'text_senha.min' => 'A senha tem de ter no mínimo :min caracteres.',
            'text_senha.max' => 'A senha tem um máximo de :max caracteres.'
        ];
    }
}
