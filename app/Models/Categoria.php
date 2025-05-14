<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto; // Asegúrate de importar el modelo relacionado

class Categoria extends Model
{
    protected $table = 'CATEGORIA';
    protected $primaryKey = 'IDCATEGORIA';
    public $timestamps = false;

    protected $fillable = [
        'NOMBCATEGORIA',
        'ESTADO'
    ];
        public function getRouteKeyName()
    {
        return 'IDCATEGORIA';
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'IDCATEGORIA', 'IDCATEGORIA');
    }
    
}
