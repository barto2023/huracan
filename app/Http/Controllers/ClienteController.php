<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Http\Requests\EliminarRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::where("estado", 1)->get();
        return view('cliente.index', compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personas= Persona::where("estado", 1)->get();
        return view('cliente.create')->with('personas', $personas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        $cliente= new Cliente();
        $cliente->persona_id=$request->persona_id;
        $cliente->razon_social=$request->razon_social;
        $cliente->nit=$request->nit;
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        $personas= Persona::where('estado', 1)->get();
        return view('cliente.edit', compact("personas", "cliente"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->persona_id=$request->persona_id;
        $cliente->razon_social=$request->razon_social;
        $cliente->nit=$request->nit;
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EliminarRequest $request)
    {
        $cliente=Cliente::findOrfail($request->id);
        $cliente->estado=0;
        $cliente->save();

        return response()->json(["mensajito"=>"Registro eliminado correctamente", "cliente"=>$cliente], 200);
    }
}
