<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venta extends Model
{
    use HasFactory;

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente:: class);
    }

    public function detalle_ventas(): HasManny
    {
        return $this->hasMany(Detalle_venta:: class);
    }
}
