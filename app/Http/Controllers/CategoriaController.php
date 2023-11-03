<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Requests\EliminarRequest;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $categorias= Categoria::where("estado", 1)->get();
       
        return view('categoria.index',compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {       
        
        return view('categoria.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        // dd($request->all());
      $categoria= new Categoria();
      $categoria->nombre=$request->nombre;
      $categoria->estado=$request->estado;
      $categoria->save();

         //   $categorias= Categoria::get();
        //return redirect()->route('categoria.index');
      // $guardado="positivo";
      // notify()->success('Categoria se guardo correctamente!');
     return redirect()->route('categoria.index')->with('guardado', "okey");

    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
      // dd($categoria);
        return view('categoria.show', compact("categoria"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
           // dd($categoria);   
        return view('categoria/edit', compact("categoria"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        //dd($categoria);
        
        $categoria->nombre=$request->nombre;
        $categoria->estado=$request->estado;
        $categoria->save();

      // return view('categorias.index', compact("categoria"));
    
    //   return redirect('categoria.index', compact("categorias"));
      return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EliminarRequest $request)
    {
        $categoria=Categoria::findOrfail($request->id);
        //$categoria->delete();
        $categoria->estado=0;
        $categoria->save();

        return response()->json(["mensajito"=>"Registro eliminado correctamente", "categoria"=>$categoria], 200);
    }
}
