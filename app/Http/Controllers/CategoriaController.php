<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NOMBCATEGORIA' => 'required|unique:CATEGORIA|max:255',
        ]);

        $categoria = new Categoria();
        $categoria->NOMBCATEGORIA = $request->NOMBCATEGORIA;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $categoria = Categoria::findOrFail($id);

    $request->validate([
        'NOMBCATEGORIA' => [
            'required',
            'max:255',
            Rule::unique('CATEGORIA', 'NOMBCATEGORIA')->ignore($categoria->IDCATEGORIA, 'IDCATEGORIA'),
        ],
    ]);

    $categoria->NOMBCATEGORIA = $request->NOMBCATEGORIA;
    $categoria->save();

    return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
