<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    //
    use HasFactory;
    protected $table = 'ubicaciones';
    protected $fillable = [
        'codigo',
        'descripcion',
    ];

    //relacioncon paquetes
    public function paquetes()
    {
        return $this->hasMany(Paquete::class);
    }
}
