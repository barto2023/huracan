<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventario extends Model
{
    use HasFactory;

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    public function detalle_ventas(): HasMany
    {
        return $this->hasMany(Detalle_venta:: class);
    }
}
