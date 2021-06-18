<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurmaAlunos extends Model
{
    use HasFactory;
    protected $fillable = ['turma_id', 'aluno_id'];
}
