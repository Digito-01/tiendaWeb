<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    protected $table = 'METODOPAGO';
    protected $primaryKey = 'IDMETODOPAGO';
    public $timestamps = false;

    protected $fillable = [
        'NOMBMETODOPAGO',
        'ESTADO'
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'IDMETODOPAGO', 'IDMETODOPAGO');
    }
    public function compras()
    {
        return $this->hasMany(Compra::class, 'IDMETODOPAGO', 'IDMETODOPAGO');
    }
    
}
