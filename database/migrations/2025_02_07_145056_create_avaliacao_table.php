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
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->id();
            $table->float("nota", 10,2)->nullable(false);

            $table->unsignedBigInteger("id_tutor");
            $table->foreign("id_tutor")->references("id")->on("tutor")->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('avaliacao');
    }
};
