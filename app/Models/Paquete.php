<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking',
        'nombre_cliente',
        'telefono_cliente',
        'nombre_vendedor',
        'telefono_vendedor',
        'tipo_paquete',
        'costo_envio',
        'costo_total',
        'espera_remuneracion',
        'urgente',
        'destino',
        'fecha_recepcion',
        'estatus',
        'comentario',
    ];

    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }
}
