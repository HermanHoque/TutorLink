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
        Schema::create('chat_msg', function (Blueprint $table) {
            $table->id();
            $table->string("msg")->nullable();
            $table->string("estado", 10)->nullable()->default("não lida");

            $table->unsignedBigInteger("id_remetente");
            $table->foreign("id_remetente")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("id_destinatario");
            $table->foreign("id_destinatario")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_msg');
    }
};
