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
        Schema::create('perfil_especialidade', function (Blueprint $table) {
            $table->id();
            $table->string("tipo", 10)->nullable();
            $table->string("custo", 40)->nullable()->default("0");
            $table->integer("num_aluno")->nullable()->default(1);
            $table->string("descricao", 100)->nullable(false);

            $table->unsignedBigInteger("id_especialidade");
            $table->foreign("id_especialidade")->references("id")->on("especialidade")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil_especialidade');
    }
};
