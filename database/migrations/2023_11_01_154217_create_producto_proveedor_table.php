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
        Schema::create('producto_proveedor', function (Blueprint $table) {
           
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id', 'fk_producto_proveedor')
            ->references('id')->on('productos');
           

            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id', 'fk_proveedor_producto')
            ->references('id')->on('proveedors');
           

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_proveedor');
    }
};
