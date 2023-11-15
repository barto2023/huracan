<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Ciudad;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Http\Requests\EliminarRequest;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedors= Proveedor::where('estado', 1)->get();
        return view('proveedor.index', compact("proveedors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ciudads= Ciudad::where('estado', 1)->get();
        return view('proveedor.create')->with('ciudads', $ciudads);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProveedorRequest $request)
    {
        $proveedor= new Proveedor();
        $proveedor->ciudad_id=$request->ciudad_id;
        $proveedor->razon_social=$request->razon_social;
        $proveedor->nit=$request->nit;
        $proveedor->telefono=$request->telefono;
        $proveedor->direccion=$request->direccion;
        $proveedor->correo=$request->correo;
        $proveedor->save();

        return redirect()->route('proveedor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        $ciudads= Ciudad::where('estado', 1)->get();
        return view('proveedor.edit', compact("ciudads", "proveedor"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProveedorRequest $request, Proveedor $proveedor)
    {
       
        $proveedor->ciudad_id=$request->ciudad_id;
        $proveedor->razon_social=$request->razon_social;
        $proveedor->nit=$request->nit;
        $proveedor->telefono=$request->telefono;
        $proveedor->direccion=$request->direccion;
        $proveedor->correo=$request->correo;
        $proveedor->save();

        return redirect()->route('proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EliminarRequest $request)
    {
        $proveedor=Proveedor::findOrfail($request->id);
        $proveedor->estado=0;
        $proveedor->save();

        return response()->json(["mensajito"=>"Registro eliminado correctamente", "ciudad"=>$proveedor], 200);
    }
}
