<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Http\Requests\StoreCiudadRequest;
use App\Http\Requests\UpdateCiudadRequest;
use App\Http\Requests\EliminarRequest;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ciudads= Ciudad::where("estado", 1)->get();
        return view('ciudad.index', compact("ciudads"));
        //return ("hola mundo");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ciudad.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCiudadRequest $request)
    {
        $ciudad= new Ciudad();
        $ciudad->nombre=$request->nombre;
        $ciudad->save();

        return redirect()->route('ciudad.index')->with('guardado', "okey");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ciudad $ciudad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ciudad $ciudad)
    {
        return view('ciudad/edit', compact("ciudad"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCiudadRequest $request, Ciudad $ciudad)
    {
        $ciudad->nombre=$request->nombre;
        $ciudad->save();

        return redirect()->route('ciudad.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EliminarRequest $request)
    {
        $ciudad= Ciudad::findOrfail($request->id);
        $ciudad->estado=0;
        $ciudad->save();

        return response()->json(["mensajito"=>"Registro eliminado correctamente", "ciudad"=>$ciudad], 200);
    }
}
