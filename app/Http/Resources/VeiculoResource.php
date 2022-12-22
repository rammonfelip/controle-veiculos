<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VeiculoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    =>  $this->id,
            'marca' =>  $this->marca,
            'modelo' =>  $this->modelo,
            'versao' =>  $this->versao,
            'fabricacao' =>  $this->fabricacao,
        ];
    }
}
