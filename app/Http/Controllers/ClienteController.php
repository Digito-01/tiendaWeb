<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sortBy = request('sortBy', 'IDCLIENTE');
        $sortDirection = request('sortDirection', 'asc');
        $search = request('search', '');

        $clientes = Cliente::with('persona')
            ->whereHas('persona', function ($query) use ($search) {
                $query->where('NOMBRES', 'like', '%' . $search . '%')
                    ->orWhere('APELLIDOS', 'like', '%' . $search . '%')
                    ->orWhere('DNI', 'like', '%' . $search . '%');
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10)
            ->appends([
                'search' => $search,
                'sortBy' => $sortBy,
                'sortDirection' => $sortDirection,
            ]);

        return view('clientes.index', compact('clientes', 'sortBy', 'sortDirection', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aquí puedes mostrar un formulario para crear un nuevo cliente
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NOMBRES' => 'required|string|max:100',
            'APELLIDOS' => 'required|string|max:100',
        ]);

        $persona = Persona::create([
            'NOMBRES' => $request->NOMBRES,
            'APELLIDOS' => $request->APELLIDOS,
            'DNI' => $request->DNI,
        ]);

        Cliente::create([
            'IDPERSONA' => $persona->IDPERSONA,
            'CREADO' => now(),
            'ACTUALIZADO' => now(),
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        // Aquí puedes mostrar los detalles de un cliente específico
        return view('clientes.show', compact('cliente'));
        // O puedes redirigir a otra vista
            // return redirect()->route('clientes.index')->with('success', 'Cliente encontrado.');
        // O puedes devolver una respuesta JSON
            // return response()->json($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        // Aquí puedes mostrar un formulario para editar un cliente específico
        return view('clientes.edit', compact('cliente'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'NOMBRES' => 'required|string|max:100',
            'APELLIDOS' => 'required|string|max:100',
        ]);

        $cliente->persona->update([
            'NOMBRES' => $request->NOMBRES,
            'APELLIDOS' => $request->APELLIDOS,
            'DNI' => $request->DNI,
        ]);

        $cliente->update([
            'ACTUALIZADO' => now(),
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }


    public function destroy(Cliente $cliente)
    {
        // Aquí puedes eliminar un cliente específico
        $cliente->delete();
        $cliente->persona()->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');

    }
}
