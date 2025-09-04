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

}
