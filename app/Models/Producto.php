<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria; // Asegúrate de importar el modelo relacionado

class Producto extends Model
{
    protected $table = 'PRODUCTO';
    protected $primaryKey = 'IDPRODUCTO'; 
    public $timestamps = false;

    protected $fillable = [
        'IDCATEGORIA',
        'NOMBPRODUCTO',
        'PRECIO',
        'ESTADO',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'IDCATEGORIA', 'IDCATEGORIA');
    }
    public function detallePedidos()
    {
        return $this->hasMany(DetallePedido::class, 'IDPRODUCTO', 'IDPRODUCTO');
    }
    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class, 'IDPRODUCTO', 'IDPRODUCTO');
    }
        
}