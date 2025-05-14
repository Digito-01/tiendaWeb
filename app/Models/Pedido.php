<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'PEDIDO';
    protected $primaryKey = 'IDPEDIDO';
    public $timestamps = false;

    protected $fillable = [
        'IDCLIENTE',
        'IDVENDEDOR',
        'ESTADO'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'IDCLIENTE', 'IDCLIENTE');
    }

    public function vendedor()
    {
        return $this->belongsTo(Persona::class, 'IDVENDEDOR', 'IDPERSONA');
    }
    public function detallepedido()
    {
        return $this->hasMany(DetallePedido::class, 'IDPEDIDO', 'IDPEDIDO');
    }
    public function ventas()
    {
        return $this->hasOne(Venta::class, 'IDPEDIDO', 'IDPEDIDO');
    }

}
