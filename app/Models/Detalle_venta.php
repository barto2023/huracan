<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detalle_venta extends Model
{
    use HasFactory; 

    public function tecnico(): BelongsTo
    {
        return $this->belongsTo(Tecnico:: class);
    }

    public function venta(): BelongsTo
    {
        return $this->belongsTo(Venta:: class);
    }

    public function inventario(): BelongsTo
    {
        return $this->belongsTo(Inventario:: class);
    }
}
