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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 20);
            $table->string('apellidos', 40);
            $table->string('carnet', 12);
            $table->string('telefono', 8);
            $table->string('direccion', 70);
            $table->string('correo', 50);
            $table->boolean('estado')->default(1);
            
            $table->unsignedBigInteger('ciudad_id');
            $table->foreign('ciudad_id', 'fk_persona_ciudad')
            ->references('id')->on('ciudads')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
