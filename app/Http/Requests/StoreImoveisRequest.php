<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreImoveisRequest extends FormRequest
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
   
            'valor' => 'required|numeric',
            'rua' => 'required',
            'bairro' => 'required',
            'numero' => 'required|numeric',
            'cidade' => 'required',    
            'estado' => 'required',
            'descricao' => 'required',
            'tipo' => 'required',
            'user_id' =>  'exists:App\Models\User,id'

         ];
    }

    public function messages()
    {
        return [
            'valor.numeric' => 'Por favor, insira um valor numerico',
            'valor.required' => 'Por favor, cadastre um Valor.',
            'rua.required' => 'Por favor, cadastre um Rua.',
            'bairro.required' => 'Por favor, cadastre um Bairro.',
            'numero.required' => 'Por favor, cadastre um Numero.',
            'cidade.required' => 'Por favor, cadastre um Cidade.',
            'estado.required' => 'Por favor, cadastre um Estado.',
        ];
    }
}
