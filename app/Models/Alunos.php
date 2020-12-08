<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'filiacao1',
        'filiacao2',
        'rg',
        'orgaoExp',
        'cpf',
        'sexo',
        'dataNascimento',
        'rua',
        'numero',
        'apt',
        'bairro',
        'municipio',
        'complemento',
        'cep',
        'telefone',
        'celular',
        'email',
        'nomeDeEmergencia',
        'numeroEmergencia',
        'trabalha',
        'localTrabalho',
        'telefoneTrabalho',
        'ocupacaoTrabalho',
        'tempoTrabalho',
        'possuiCarteiraDeTrabalho',
        'cadastroCine',
        'rendaFamiliar',
        'estuda',
        'escolaridade',
        'nis',
        'auxilioFinanceiro',
    ];
}
