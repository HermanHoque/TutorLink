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
        Schema::create('tutor', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_tutor')->unique();
            $table->string("nome_tutor", 20)->nullable(false);//não pode ser null
            $table->string("endereco", 30)->nullable(false);
            $table->integer("telefone_tutor")->nullable(false);//
            $table->integer("whatsapp")->nullable();
            $table->string("nivel_academico", 40)->nullable();
            $table->string("descricao")->nullable(false);
            $table->string("estado", 10)->nullable(false)->default("on");
            $table->string("foto_tutor")->nullable();
            /* criar chave estrangeira */
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
        Schema::dropIfExists('tutor');
    }
};
