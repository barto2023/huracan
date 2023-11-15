<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detalle_compra extends Model
{
    use HasFactory;

    public function compra(): BelongsTo
    {
        return $this->belongsTo(Compra::class);
    }
}
