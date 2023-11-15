<?php

namespace App\Http\Controllers;

use App\Models\Detalle_compra;
use App\models\Producto;
use App\models\Compra;
use App\Http\Requests\StoreDetalle_compraRequest;
use App\Http\Requests\UpdateDetalle_compraRequest;

class Detalle_CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDetalle_compraRequest $request)
    {
        $detalle_compra= new Detalle_compra();
        $detalle_compra->producto_id=$request->producto_id;
        $detalle_compra->compra_id=$request->compra_id;
        $detalle_compra->cantidad=$request->cantidad;
        $detalle_compra->precio=$request->precio;
        $subtotal= $request->cantidad * $detalle_compra->precio;
        $detalle_compra->subtotal = $subtotal;
        $detalle_compra->estado=0;
        $detalle_compra->save();

        return redirect()->route('compra.edit', $request->compra_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Detalle_compra $detalle_compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detalle_compra $detalle_compra)
    {
        // $detalle_compra= Detalle_compra::find($id);
        // return redirect()->route('detalle_compra.edit', compact("detalle_compra", "compra"));
        $compras= Compra::where('estado', 1)->get();
        return view('detalle_compra.edit', compact("detalle_compra", "compras"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetalle_compraRequest $request, Detalle_compra $detalle_compra)
    {
        $detalle_compra->producto_id=$request->producto_id;
        $detalle_compra->compra_id=$request->compra_id;
        $detalle_compra->cantidad=$request->cantidad;
        $detalle_compra->precio=$request->precio;
        $subtotal= $request->cantidad * $detalle_compra->precio;
        $detalle_compra->subtotal = $subtotal;
        $detalle_compra->estado=0;
        $detalle_compra->save();

        return redirect()->route('compra.edit', $detalle_compra->compra_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detalle_compra $detalle_compra)
    {
        //
    }
}
