<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenDetalle extends Model
{
    use HasFactory;

    protected $table = 'orden_detalles';

    protected $fillable = [
        'orden_id',
        'nombre_arte',
        'tamaño_diseño',
        'color_hilo',
        'ubicacion_prenda',
        'tamaño_cuello',
        'cantidad',
        'precio_unitario',
        'total',
        'notas',
    ];

    /**
     * 🔹 Relaciones
     */

    // Cada detalle pertenece a una orden
    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }

    // Si un detalle puede tener muchas imágenes de arte (como dijimos antes)
    public function imagenes()
    {
        return $this->hasMany(OrdenDetalleImagen::class);
    }

    // Si el detalle usa materiales (por ejemplo tipo de hilo)
    public function materiales()
    {
        return $this->belongsToMany(Material::class, 'detalle_materiales')
                    ->withPivot('cantidad_usada')
                    ->withTimestamps();
    }

    /**
     * 🔹 Métodos auxiliares
     */

    // Calcular total automáticamente (cantidad * precio unitario)
    public function calcularTotal()
    {
        $this->total = $this->cantidad * $this->precio_unitario;
        $this->save();
    }

    // Mostrar descripción resumida (para vistas o reportes)
    public function getDescripcionCortaAttribute()
    {
        return "{$this->nombre_arte} - {$this->color_hilo} ({$this->cantidad}x)";
    }
}
