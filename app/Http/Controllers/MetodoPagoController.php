<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metodosPago = MetodoPago::all();
        return view('metodopago.index', compact('metodosPago'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('metodopago.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NOMBMETODOPAGO' => 'required|unique:metodopagos|max:255',
        ]);

        $metodoPago = new MetodoPago();
        $metodoPago->NOMBMETODOPAGO = $request->NOMBMETODOPAGO;
        $metodoPago->save();

        return redirect()->route('metodopago.index')->with('success', 'Método de pago creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MetodoPago $metodoPago)
    {
        return view('metodopago.show', compact('metodoPago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MetodoPago $metodoPago)
    {
        return view('metodopago.edit', compact('metodoPago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MetodoPago $metodoPago)
    {
        $request->validate([
            'NOMBMETODOPAGO' => 'required|unique:metodopagos,NOMBMETODOPAGO,' . $metodoPago->id . '|max:255',
        ]);

        $metodoPago->NOMBMETODOPAGO = $request->NOMBMETODOPAGO;
        $metodoPago->save();

        return redirect()->route('metodopago.index')->with('success', 'Método de pago actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetodoPago $metodoPago)
    {
        $metodoPago->delete();
        return redirect()->route('metodopago.index')->with('success', 'Método de pago eliminado exitosamente.');
    }
}
