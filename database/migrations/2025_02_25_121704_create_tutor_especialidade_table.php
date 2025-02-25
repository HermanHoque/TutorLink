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
        Schema::create('tutor_especialidade', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger("id_tutor");
            $table->unsignedBigInteger("id_especialidade");

            $table->foreign("id_tutor")->references("id")->on("tutor")->onDelete("cascade")->onUpdate("cascade");
            
            $table->foreign("id_especialidade")->references("id")->on("especialidade")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_especialidade');
    }
};
