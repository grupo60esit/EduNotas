<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    //
      use HasFactory;
       public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

     public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
