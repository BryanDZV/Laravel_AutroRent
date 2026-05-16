<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Alquiler extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_inicio',
        'dias',
        'empleado_id',
        'cliente_id',
        'vehiculo_id',
    ];

    //relaciones

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(User::class, 'empleado_id');
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
    public function factura(): HasOne
    {
        return $this->hasOne(Factura::class);
    }
}
