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
        Schema::create('solicitacao', function (Blueprint $table) {
            $table->string("estado", 10)->nullable()->default("em espera");

            $table->unsignedBigInteger("id_perfil_especialidade");
            $table->foreign("id_perfil_especialidade")->references("id")->on("perfil_especialidade")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("id_aluno");
            $table->foreign("id_aluno")->references("id")->on("aluno")->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto');
    }
};
