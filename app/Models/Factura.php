<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'alquiler_id',
        'fecha_emision',
        'importe_total'
    ];
    //relaciones

    public function alquiler(): BelongsTo
    {
        return $this->belongsTo(Alquiler::class, 'alquiler_id');
    }
};
