<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'marca',
        'modelo',
        'precio_dia'
    ];

    public function alquileres()
    {
        return $this->hasMany(Alquiler::class);
    }
}
