<?php

namespace App\Http\Controllers;

use App\Models\Detalle_venta;
use App\Models\Venta;
use App\Models\Servicio;
use App\Models\Inventario;
use App\Http\Requests\StoreDetalle_ventaRequest;
use App\Http\Requests\UpdateDetalle_ventaRequest;

class DetalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return("hola mundo real");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function cantidadMayorACero($cantidad){
        return $cantidad > 0;
    }
    public function store(StoreDetalle_ventaRequest $request)
    {
        if($this->cantidadMayorACero($request->cantidad)==true)
        {
            $detalle_venta = new Detalle_venta();
            $detalle_venta->venta_id = $request->venta_id;
            if($request->inventario_id){
                $detalle_venta->inventario_id = $request->inventario_id;
                $inventario = Inventario::find($request->inventario);
                $subtotal = $request->cantidad * $inventario->precio_venta;
                $inventario->stock =$inventario->stock - $request->cantidad;
                $inventario->save();
            }
            elseif($request->servicio_id){
                $detalle_venta->servicio_id = $request->servicio_id;
                $servicio = Servicio::find($request->servicio_id);
                $subtotal = $request->cantidad * $servicio->precio;
            }

            $detalle_venta->cantidad = $request->cantidad;

            $detalle_venta->subtotal = $subtotal;
            $detalle_venta->estado = 0;
            $detalle_venta->save();
        }
        return redirect()->route('venta.edit', $request->venta_id);

    }

    /**
     * Display the specified resource.
     */
    public function show(Detalle_venta $detalle_venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detalle_venta $detalle_venta)
    {
        $detalle_venta = Detalle_venta::find($id);
        return redirect()->route('venta.edit', $request->venta_id)
        ->with('detalle_venta', $detalle_venta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetalle_ventaRequest $request, Detalle_venta $detalle_venta)
    {
        $detalle_venta = Detalle_venta::find($id);
        $detalle_venta->venta_id = $request->venta_id;
        $detalle_venta->inventario_id = $request->inventario_id;
        $detalle_venta->cantidad = $request->cantidad;
        $detalle_venta->subtotal = $request->subtotal;
        $detalle_venta->save();

        return redirect()->route('venta.edit', $detalle_venta->venta_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detalle_venta $detalle_venta)
    {
        //
    }
}
