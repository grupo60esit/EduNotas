<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumno extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'nombre_responsable',
        'telefono_responsable',
        'carnet',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($alumno) {
            $alumno->carnet = 'A' . str_pad((Alumno::max('id') + 1), 5, '0', STR_PAD_LEFT);
        });
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

       public function materias()
    {
        return $this->belongsToMany(Materia::class, 'matriculas')
            ->withPivot('tipo_matricula', 'fecha_inicio', 'estado')
            ->withTimestamps();
    }
}
