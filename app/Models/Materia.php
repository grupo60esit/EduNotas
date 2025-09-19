<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    //
    public function matriculas()
{
    return $this->hasMany(Matricula::class);
}
   public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'matriculas')
            ->withPivot('tipo_matricula', 'precio', 'fecha_inicio', 'estado')
            ->withTimestamps();
    }

      public function obtenerPrecio($tipoMatricula)
    {
        return $this->precios()->where('tipo_matricula', $tipoMatricula)->first();
    }

       public function precios()
    {
        return $this->hasMany(Precio::class);
    }

}
