<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //
    public function alumno()
{
    return $this->belongsTo(Alumno::class);
}

public function materia()
{
    return $this->belongsTo(Materia::class);
}

}
