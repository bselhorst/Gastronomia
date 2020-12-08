<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisciplinaIdCursoModuloDisciplinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curso_modulo_disciplinas', function (Blueprint $table) {
            $table->foreignId('modulo_id')->nullable()->after('id');
            $table->foreign('modulo_id')->references('id')->on('curso_modulos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curso_modulo_disciplinas', function (Blueprint $table) {
            $table->dropForeign('curso_modulo_disciplinas_modulo_id_foreign');
            $table->dropColumn('modulo_id');
        });
    }
}
