<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Detalle_compra;
use App\Models\Producto;
use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Http\Requests\EliminarRequest;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras= Compra::where('estado', 1)->get();
        $proveedors= Proveedor::where('estado', 1)->get();
        return view('compra.index', compact("compras", "proveedors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedors= Proveedor::where('estado', 1)->get();
        return view('compra.create')->with('proveedors', $proveedors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompraRequest $request)
    {
        $compra= new Compra();
        $compra->proveedor_id=$request->proveedor_id;
        $compra->total=$request->total;
        //$compra->estado=0;
        $compra->save();

        return redirect()->route('compra.edit', $compra->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        // $compra= Compra::find($id);
        // $detalle_compra= Detalle_compra::where('compra_id', $id)->where('estado', 1)->get();
        $detalle_compra= Detalle_compra::where('estado', 1)->get();
        $proveedors= Proveedor::where('estado', 1)->get();
        $productos= Producto::where('estado', 1)->get();

        // return view('compra.edit')->with('compra', $compra)->with('detalle_compra', $detalle_compra);
        return view('compra.edit', compact("detalle_compra", "proveedors", "productos", "compra"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompraRequest $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EliminarRequest $request)
    {
        
        $compra= compra::findOrfail($request->id);
        $compra->estado=0;
        $compra->save();

        return response()->json(["mensajito"=>"Registro eliminado correctamente", "detalle_compra"=>$compra], 200);
    }
    
}
