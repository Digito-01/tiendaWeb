<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'PERSONA';
    protected $primaryKey = 'IDPERSONA';
    public $timestamps = false;

    protected $fillable = [
        'NOMBRES',
        'APELLIDOS',
        'DNI',
        'ESTADO'
    ];
    public function getRouteKeyName()
    {
        return 'IDPERSONA';
    }
    public function compras()
    {
        return $this->hasMany(Compra::class, 'IDPERSONA', 'IDPERSONA');
    }
    public function clientes()
    {
        return $this->hasOne(Cliente::class, 'IDPERSONA', 'IDPERSONA');
    }
    public function vendedores()
    {
        return $this->hasMany(Pedido::class, 'IDVENDEDOR', 'IDPERSONA');
    }
    
}
