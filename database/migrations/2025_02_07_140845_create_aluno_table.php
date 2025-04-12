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
        Schema::create('aluno', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_aluno')->unique();
            $table->string("nome_aluno", 20)->nullable(false);
            $table->string("nivel_academico", 30)->nullable();
            $table->integer("telefone_aluno")->nullable();
            $table->string("descricao")->nullable(false);
            $table->string("foto_aluno")->nullable();

            /* chave estrangeira */
            $table->unsignedBigInteger("id_user");
            $table->foreign("id_user")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluno');
    }
};
