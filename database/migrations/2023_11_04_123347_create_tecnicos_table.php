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
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->id();
            $table->string('telefono', 12);
            $table->string('rol', 20);
            $table->string('correo', 30);
            $table->string('password', 15);
            $table->boolean('estado')->default(1);
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id', 'fk_tecnico_persona')
            ->references('id')->on('personas')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tecnicos');
    }
};
