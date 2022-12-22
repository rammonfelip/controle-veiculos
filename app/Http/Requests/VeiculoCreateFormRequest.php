<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class VeiculoCreateFormRequest extends FormRequest
{
    protected $redirectRoute = 'veiculo.adicionar';

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'marca' => 'required',
            'modelo' => 'required',
            'versao' => 'required',
            'fabricacao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'marca' => 'O campo marca precisa ser preenchido',
            'modelo' => 'O campo modelo precisa ser preenchido',
            'versao' => 'O campo versao precisa ser preenchido',
            'fabricacao' => 'O campo fabricacao precisa ser preenchido',
        ];
    }
}
