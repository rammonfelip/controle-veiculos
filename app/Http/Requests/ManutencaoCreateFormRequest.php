<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ManutencaoCreateFormRequest extends FormRequest
{
    protected $redirectRoute = 'manutencao.adicionar';

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'veiculo_id' => 'required',
            'agendamento' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'veiculo_id' => 'Você precisa selecionar um veículo.',
            'agendamento' => 'É necessário preencher a data do agendamento.',
        ];
    }
}
