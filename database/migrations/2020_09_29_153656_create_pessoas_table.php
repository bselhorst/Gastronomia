<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('filiacao1');
            $table->string('filiacao2');
            $table->string('rg');
            $table->string('orgaoExp');
            $table->string('cpf');
            $table->string('sexo');
            $table->date('dataNascimento');
            $table->string('rua');
            $table->string('numero');
            $table->string('apt');
            $table->string('bairro');
            $table->string('municipio');
            $table->string('complemento');
            $table->string('cep');
            $table->string('telefone');
            $table->string('celular');
            $table->string('email');
            $table->string('nomeDeEmergencia');
            $table->string('numeroEmergencia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
