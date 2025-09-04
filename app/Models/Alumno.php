<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //

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


}
