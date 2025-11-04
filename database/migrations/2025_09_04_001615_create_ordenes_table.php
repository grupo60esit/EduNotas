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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null');

            $table->date('fecha_orden');
            $table->string('codigo_orden')->unique();
            $table->date('fecha_entrega')->nullable();
            $table->enum('estado', ['pendiente', 'en_proceso', 'completada', 'cancelada'])->default('pendiente');
            $table->enum('tipo',['venta','compra'])->default('venta');

              // Totales de la orden
    $table->decimal('subtotal', 12, 2)->default(0);
    $table->decimal('impuestos', 12, 2)->default(0);
    $table->decimal('total', 12, 2)->default(0);

     // Control y trazabilidad
    $table->unsignedBigInteger('usuario_id')->nullable(); // quién registró la orden
    $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');

    $table->text('notas')->nullable(); // notas generales del pedido

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};
