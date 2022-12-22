<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ManutencaoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    =>  $this->id,
            'veiculo' => new VeiculoResource($this->veiculo),
            'data_agendamento' => Carbon::parse($this->agendamento)->format('d/m/Y'),
            'descricao' =>  $this->descricao,
            'realizado' =>  $this->realizado,
            'data_realizado' => $this->data_realizado ? Carbon::parse($this->data_realizado)->format('d/m/Y') : null,
        ];
    }
}
