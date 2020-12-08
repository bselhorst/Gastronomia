<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'habilitacao',
        'eixo_tecnologico',
        'forma_ofertada',
        'qualificacao_tecnica',
    ];
}
