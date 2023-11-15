<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Http\Requests\StoreInventarioRequest;
use App\Http\Requests\UpdateInventarioRequest;
use App\Http\Requests\EliminarRequest;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return("hola mundo real");
        $inventarios= Inventario::where('estado', 1)->get();
        return view('inventario.index', compact("inventarios"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos= Producto::where('estado', 1)->get();
        return view('inventario.create')->with('productos', $productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInventarioRequest $request)
    {
        $inventario= new Inventario();
        $inventario->producto_id=$request->producto_id;
        $inventario->stock=$request->stock;
        $inventario->precio_compra=$request->precio_compra;
        $inventario->precio_venta=$request->precio_venta;
        $inventario->save();

        return redirect()->route('inventario.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventario $inventario)
    {
        $productos= Producto::where('estado', 1)->get();
        return view('inventario.edit', compact("productos", "inventario"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventarioRequest $request, Inventario $inventario)
    {
        $inventario->producto_id=$request->producto_id;
        $inventario->stock=$request->stock;
        $inventario->precio_compra=$request->precio_compra;
        $inventario->precio_venta=$request->precio_venta;
        $inventario->save();
       
        return redirect()->route('inventario.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EliminarRequest $request)
    {
        $inventario= Inventario::findOrfail($request->id);
        $inventario->estado=0;
        $inventario->save();

        return response()->json(["mensajito"=>"Registro eliminado correctamente", "producto"=>$inventario], 200);
    }
    
}
