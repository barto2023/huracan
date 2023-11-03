<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Ciudad;
use App\Http\Requests\StorePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use App\Http\Requests\EliminarRequest;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return("hola mundo");
        $personas= Persona::where('estado', 1)->get();
        return view('persona.index', compact("personas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ciudads= Ciudad::where('estado', 1)->get();
        return view('persona.create')->with('ciudads', $ciudads);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonaRequest $request)
    {
        $persona= new Persona();
        $persona->nombre=$request->nombre;
        $persona->apellidos=$request->apellidos;
        $persona->carnet=$request->carnet;
        $persona->ciudad_id=$request->ciudad_id;
        $persona->telefono=$request->telefono;
        $persona->direccion=$request->direccion;
        $persona->correo=$request->correo;
        $persona->save();

        return redirect()->route('persona.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        $ciudads= Ciudad::where('estado', 1)->get();
        return view('persona.edit', compact("ciudads", "persona"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonaRequest $request, Persona $persona)
    {
        $persona->nombre=$request->nombre;
        $persona->apellidos=$request->apellidos;
        $persona->carnet=$request->carnet;
        $persona->ciudad_id=$request->ciudad_id;
        $persona->telefono=$request->telefono;
        $persona->direccion=$request->direccion;
        $persona->correo=$request->correo;
        $persona->save();

        return redirect()->route('persona.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EliminarRequest $request)
    {
        $persona= Persona::findOrfail($request->id);
        $persona->estado=0;
        $persona->save();

        return response()->json(["mensajito"=>"Registro eliminado correctamente", "ciudad"=>$persona], 200);
    }
}
