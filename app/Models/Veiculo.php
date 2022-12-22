<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculo';

    protected $fillable = [
        'user_id', 'marca', 'modelo', 'versao', 'fabricacao'
    ];
}
