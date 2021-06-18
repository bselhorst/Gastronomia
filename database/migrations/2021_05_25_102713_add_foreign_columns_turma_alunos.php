<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignColumnsTurmaAlunos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('turma_alunos', function (Blueprint $table) {
            $table->foreignId('turma_id')->nullable()->after('id');
            $table->foreign('turma_id')->references('id')->on('curso_turmas')->onDelete('cascade');
            $table->foreignId('aluno_id')->nullable()->after('turma_id');
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turma_alunos', function (Blueprint $table) {
            $table->dropForeign('turma_alunos_turma_id_foreign');
            $table->dropColumn('turma_id');
            $table->dropForeign('turma_alunos_aluno_id_foreign');
            $table->dropColumn('aluno_id');
        });
    }
}
