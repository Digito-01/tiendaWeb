<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'VENTA';
    protected $primaryKey = 'IDVENTA';
    public $timestamps = false;

    protected $fillable = [
        'IDPEDIDO',
        'IDMETODOPAGO',
        'PRECIOVENTA',
        'ESTADO',
        'FECHA'
    ];
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'IDPEDIDO', 'IDPEDIDO');
    }
    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'IDMETODOPAGO', 'IDMETODOPAGO');
    }
    

}
