<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pf_especialidade_aluno', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pf_especialidade');
            $table->unsignedBigInteger('id_aluno');

            $table->foreign('id_pf_especialidade')->references('id')->on('perfil_especialidade')->onDelete("cascade")->onUpdate("cascade");

            $table->foreign('id_aluno')->references('id')->on('aluno')->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pf_especialidade_aluno');
    }
};
