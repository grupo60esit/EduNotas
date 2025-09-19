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
        Schema::create('precios', function (Blueprint $table) {
            $table->id(); // ID del precio
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');  // Relación con la tabla 'materias'
            $table->enum('tipo_matricula', ['presencial', 'linea']);  // Tipo de matrícula: presencial o línea
            $table->decimal('precio', 8, 2);  // Precio para el tipo de matrícula y materia
            $table->timestamps();  // Tiempos de creación y actualización
        });
           // Insertar los precios por tipo de matrícula y materia
   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precios');
    }
};
