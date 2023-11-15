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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('cod_producto', 20);
            $table->string('marca', 20);
            $table->string('descripcion', 100);
            $table->string('foto')->nullable();
            $table->boolean('estado')->default(1);
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id', 'fk_producto_categoria')
            ->references('id')->on('categorias')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
