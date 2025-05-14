<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'CLIENTE';
    protected $primaryKey = 'IDCLIENTE';
    public $timestamps = false;

    protected $fillable = [
        'IDPERSONA',
        'ESTADO'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'IDPERSONA', 'IDPERSONA');
    }
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'IDCLIENTE', 'IDCLIENTE');
    }
    
}
