<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Proveedor extends Model
{
    use HasFactory;

    public function ciudad():BelongsTo
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function productos():BelongsToMany
    {
        return $this->belongsToMany(Producto::class);
    }
    
}
