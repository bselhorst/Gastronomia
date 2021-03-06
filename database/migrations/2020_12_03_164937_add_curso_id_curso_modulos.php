<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCursoIdCursoModulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curso_modulos', function (Blueprint $table) {
            $table->foreignId('curso_id')->nullable()->after('id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curso_modulos', function (Blueprint $table) {
            $table->dropForeign('curso_modulos_curso_id_foreign');
            $table->dropColumn('curso_id');
        });
    }
}
