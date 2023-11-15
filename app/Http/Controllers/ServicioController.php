<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Http\Requests\StoreServicioRequest;
use App\Http\Requests\UpdateServicioRequest;
use App\Http\Requests\EliminarRequest;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios= Servicio::where('estado', 1)->get();
        return view('servicio.index', compact("servicios"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServicioRequest $request)
    {
        $servicio= new Servicio();
        $servicio->nombre=$request->nombre;
        $servicio->descripcion=$request->descripcion;
        $servicio->precio=$request->precio;
        $servicio->save();

        return redirect()->route('servicio.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        return view('servicio.edit', compact("servicio"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServicioRequest $request, Servicio $servicio)
    {
        $servicio->nombre=$request->nombre;
        $servicio->descripcion=$request->descripcion;
        $servicio->precio=$request->precio;
        $servicio->save();

        return redirect()->route('servicio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EliminarRequest $request)
    {
        $servicio= Servicio::findOrfail($request->id);
        $servicio->estado=0;
        $servicio->save();

        return response()->json(["mensajito"=>"Registro eliminado correctamente",  "servicio"=>$servicio], 200);
    }
}
