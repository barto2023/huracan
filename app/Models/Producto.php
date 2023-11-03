<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsToMany;

class Producto extends Model
{
    use HasFactory;
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function proveedors():BelongsToMany
    {
        return $this->belongsToMany(Proveedor::class);
    }

}
