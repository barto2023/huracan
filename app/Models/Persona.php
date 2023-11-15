<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Persona extends Model
{
    use HasFactory;

    public function ciudad(): BelongsTo  
    {
        return $this->belongsTo(Ciudad::class);
    }
    public function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class);
    }

    public function tecnico(): HasOne
    {
        return $this->hasOne(Tecnico:: class);
    }

}
