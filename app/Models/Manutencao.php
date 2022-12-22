<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    use HasFactory;

    protected $table = 'manutencao';
    protected $fillable = [
        'veiculo_id', 'agendamento', 'descricao', 'realizado', 'data_realizado'
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}
