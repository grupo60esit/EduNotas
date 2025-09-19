<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //
      protected $fillable = [
        'alumno_id',
        'materia_id',
        'tipo_matricula',
       
        'fecha_inicio',
        'estado',
    ];

    public function alumno()
{
    return $this->belongsTo(Alumno::class);
}

public function materia()
{
    return $this->belongsTo(Materia::class);
}

   public function notas()
    {
        return $this->hasMany(Nota::class);
    }

      // Relación con la tabla 'precios'
    public function precio()
    {
        return $this->belongsTo(Precio::class);
    }

}
