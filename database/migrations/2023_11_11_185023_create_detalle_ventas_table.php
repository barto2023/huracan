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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cantidad');
            $table->decimal('subtotal', 10,2);
            $table->boolean('estado')->default(1);

            $table->unsignedBigInteger('inventario_id');
            $table->foreign('inventario_id', 'fk_detalle_venta_inventario')
            ->references('id')->on('inventarios')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id', 'fk_detalle_venta_servicio')
            ->references('id')->on('servicios')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id', 'fk_detalle_venta_venta')
            ->references('id')->on('ventas')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
