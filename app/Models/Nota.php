<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //
       use HasFactory;

    // Nombre de la tabla (opcional, Laravel ya lo deduce como "notas")
    protected $table = 'notas';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'matricula_id',
        'evaluacion',
        'nota',
        'observaciones',
    ];

    /**
     * Relación: una nota pertenece a una matrícula
     */
    public function matricula()
    {
        return $this->belongsTo(Matricula::class);
    }
}


