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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
               // Relación con la matrícula (alumno + materia)
            $table->foreignId('matricula_id')
                  ->constrained('matriculas')
                  ->onDelete('cascade');

            // Tipo de evaluación (ej: parcial1, parcial2, final, proyecto, etc.)
            $table->string('evaluacion')->nullable();

            // Nota numérica
            $table->decimal('nota', 5, 2)->nullable();

            // Observaciones adicionales
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
