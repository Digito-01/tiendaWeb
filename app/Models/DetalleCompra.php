<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'DETALLECOMPRA';
    protected $primaryKey = 'IDDETALLECOMPRA';
    public $timestamps = false;

    protected $fillable = [
        'IDCOMPRA',
        'IDPRODUCTO',
        'CANTIDAD',
        'COSTO'
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'IDCOMPRA', 'IDCOMPRA');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'IDPRODUCTO', 'IDPRODUCTO');
    }
    
}
