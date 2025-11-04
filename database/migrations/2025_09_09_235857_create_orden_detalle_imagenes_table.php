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
        Schema::create('orden_detalle_imagenes', function (Blueprint $table) {
            $table->id();

           $table->unsignedBigInteger('orden_detalle_id');
    $table->foreign('orden_detalle_id')->references('id')->on('orden_detalles')->onDelete('cascade');

    $table->string('ruta_imagen');
    $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_detalle_imagenes');
    }
};
