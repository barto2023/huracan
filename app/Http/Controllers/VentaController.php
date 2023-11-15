<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Servicio;
use App\Models\Inventario;
use App\Models\Cliente;
use App\Models\Detalle_venta;
use App\Http\Requests\StoreVentaRequest;
use App\Http\Requests\UpdateVentaRequest;
use App\Http\Requests\EliminarRequest;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas= Venta::where('estado', 1)->get();
        return view('venta.index', compact("ventas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes= Cliente::where('estado', 1)->get();
        return view('venta.create')->with('clientes', $clientes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVentaRequest $request)
    {
        $venta= new Venta();
        $venta->cliente_id=$request->cliente_id;
        $venta->estado=0;
        $venta->save();

        return redirect()->route('venta.edit', $venta->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        // $venta= Venta::find($id);
        $clientes = Cliente::where('estado', 1)->get();
        $detalle_venta = Detalle_venta::where('estado',1)->get();
        $inventarios = Inventario::where('estado', 1)->where('stock', '>', 0)->get();
        $servicios = Servicio::where('estado', 1)->get();
 
        return view('venta/edit')->with('venta', $venta)
        ->with('inventarios', $inventarios)
        ->with('servicios', $servicios)
        ->with('detalle_venta', $detalle_venta)
        ->with('clientes', $clientes);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVentaRequest $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EliminarRequest $request)
    {
        $venta= Venta::findOrfail($request->id);
        $venta->estado=0;
        $venta->save();

        return response()->json(["mensajito"=>"Registro eliminado correctamente", "cliente"=>$venta], 200);
    
    }
}
