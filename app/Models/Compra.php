<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'COMPRA';
    protected $primaryKey = 'IDCOMPRA';
    public $timestamps = false;

    protected $fillable = [
        'IDPERSONA',
        'IDMETODOPAGO',
        'FECHA',
        'TOTAL',
        'ESTADO'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'IDPERSONA', 'IDPERSONA');
    }
    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class, 'IDCOMPRA', 'IDCOMPRA');
    }
    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'IDMETODOPAGO', 'IDMETODOPAGO');
    }
    public function scopeFilter($query, $filters)
    {
        if (isset($filters['IDPERSONA'])) {
            $query->where('IDPERSONA', $filters['IDPERSONA']);
        }
        if (isset($filters['IDMETODOPAGO'])) {
            $query->where('IDMETODOPAGO', $filters['IDMETODOPAGO']);
        }
        if (isset($filters['FECHA'])) {
            $query->where('FECHA', 'like', '%' . $filters['FECHA'] . '%');
        }
        if (isset($filters['ESTADO'])) {
            $query->where('ESTADO', $filters['ESTADO']);
        }
    }
    public function scopeFilterByDate($query, $startDate, $endDate)
    {
        return $query->whereBetween('FECHA', [$startDate, $endDate]);
    }
    
}
