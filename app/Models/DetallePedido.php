<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'DETALLEPEDIDO';
    protected $primaryKey = 'IDDETALLEPEDIDO';
    public $timestamps = false;

    protected $fillable = [
        'IDPEDIDO',
        'IDPRODUCTO',
        'CANTIDAD',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'IDPEDIDO', 'IDPEDIDO');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'IDPRODUCTO', 'IDPRODUCTO');
    }
    
}
