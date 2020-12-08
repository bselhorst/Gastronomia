<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoModuloDisciplinas extends Model
{
    use HasFactory;
    protected $fillable = ['modulo_id', 'nome', 'carga_horaria', 'competencia'];
}
