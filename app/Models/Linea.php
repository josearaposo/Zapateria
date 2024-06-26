<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    public function zapato()
    {
        return $this->belongsTo(Zapato::class);
    }
}
