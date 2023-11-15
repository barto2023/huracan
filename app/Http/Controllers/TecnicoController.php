<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use App\Models\Persona;
use App\Http\Requests\StoreTecnicoRequest;
use App\Http\Requests\UpdateTecnicoRequest;
use App\Http\Requests\EliminarRequest;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos= Tecnico::where('estado', 1)->get();
        return view('tecnico.index', compact("tecnicos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personas= Persona::where('estado', 1)->get();
        return view('tecnico.create')->with('personas', $personas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTecnicoRequest $request)
    {
        $tecnico= new Tecnico();
        $tecnico->persona_id=$request->persona_id;
        $tecnico->telefono=$request->telefono;
        $tecnico->rol=$request->rol;
        $tecnico->correo=$request->correo;
        $tecnico->password=$request->password;
        $tecnico->save();

        return redirect()->route('tecnico.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tecnico $tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tecnico $tecnico)
    {
        $personas= Persona::where('estado', 1)->get();
        return view('tecnico.edit', compact("personas", "tecnico"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTecnicoRequest $request, Tecnico $tecnico)
    {
        $tecnico->persona_id=$request->persona_id;
        $tecnico->telefono=$request->telefono;
        $tecnico->rol=$request->rol;
        $tecnico->correo=$request->correo;
        $tecnico->password=$request->password;
        $tecnico->save();

        return redirect()->route('tecnico.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EliminarRequest $request)
    {
        $tecnico= Tecnico::findOrfail($request->id);
        $tecnico->estado=0;
        $tecnico->save();

        return response()->json(["mensajito"=>"Registro eliminado correctamente", "persona"=>$tecnico], 200);
    }
}
