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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cantidad');
            $table->decimal('precio', 10, 2);
            $table->decimal('subtotal', 10, 2);

            $table->boolean('estado')->default(1);

            $table->unsignedBigInteger('compra_id');
            $table->foreign('compra_id', 'fk_detalle_compra_compra')
            ->references('id')->on('compras')
            ->onDelete('cascade');

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id', 'fk_detalle_compra_producto')
            ->references('id')->on('productos')
            ->onDelete('cascade');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};
