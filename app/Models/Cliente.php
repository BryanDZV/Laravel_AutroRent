<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellidos', 'dni', 'telefono', 'tipo_cliente'];
    //relaciones
    public function alquileres(): HasMany
    {
        return $this->hasMany(Alquiler::class);
    }
}
