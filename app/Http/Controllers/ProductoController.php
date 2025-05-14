<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sortBy = request('sortBy', 'IDPRODUCTO');
        $sortDirection = request('sortDirection', 'asc');
        $search = request('search', '');

        $productos = Producto::with('categoria')
            ->where(function ($query) use ($search) {
                $query->where('NOMBPRODUCTO', 'like', '%' . $search . '%')
                    ->orWhere('PRECIO', 'like', '%' . $search . '%')
                    ->orWhereHas('categoria', function ($q) use ($search) {
                        $q->where('NOMBCATEGORIA', 'like', '%' . $search . '%');
                    });
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10)
            ->appends([
                'search' => $search,
                'sortBy' => $sortBy,
                'sortDirection' => $sortDirection,
            ]);

        $categorias = Categoria::all();
        return view('productos.index', compact('productos', 'categorias', 'sortBy', 'sortDirection', 'search'));
    }


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();  // Primero obtener las categorías
        return view('productos.create', compact('categorias'));  // Luego pasar las categorías a la vista
    }    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NOMBPRODUCTO' => 'required|unique:PRODUCTO|max:255',
            'PRECIO' => 'required|numeric',
            'IDCATEGORIA' => 'required|exists:CATEGORIA,IDCATEGORIA',
        ]);
    
        $producto = new Producto();
        $producto->NOMBPRODUCTO = $request->NOMBPRODUCTO;
        $producto->PRECIO = $request->PRECIO;
        $producto->IDCATEGORIA = $request->IDCATEGORIA;
        $producto->save();
    
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();  // Obtener las categorías
        return view('productos.edit', compact('producto', 'categorias'));  // Pasar el producto y las categorías
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NOMBPRODUCTO' => 'required|max:255|unique:PRODUCTO,NOMBPRODUCTO,' . $id . ',IDPRODUCTO',
            'PRECIO' => 'required|numeric',
            'IDCATEGORIA' => 'required|exists:CATEGORIA,IDCATEGORIA',
        ]);        
    
        $producto = Producto::findOrFail($id);
        $producto->NOMBPRODUCTO = $request->NOMBPRODUCTO;
        $producto->PRECIO = $request->PRECIO;
        $producto->IDCATEGORIA = $request->IDCATEGORIA;
        $producto->save();
    
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
    
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
