<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Http\Requests\EliminarRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$productos= Producto::get();
        $productos= Producto::where("estado", 1)->get();
        return view('producto.index', compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias= Categoria::where('estado', 1)->get();
        return view('producto.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        $producto= new Producto();
        $producto->categoria_id=$request->categoria_id;
        $producto->marca=$request->marca;
        $producto->descripcion=$request->descripcion;
        // dd($request->foto);muestra especifico
        // dd($request->all());
        if($request->hasFile('foto')){
            $foto=$request->file('foto');
            $nombreImagen='foto_productos/'.Str::random(20).'.jpg';
            $imagen=Image::make($foto)->encode('jpg',75);
            $imagen->resize(300,300,function($constraint){
                $constraint->upsize();
            });
            $fotillo = storage::disk('public')->put($nombreImagen, $imagen->stream());
            $producto->foto=$nombreImagen;
        }else{
            $producto->foto= "foto_productos/sinfoto.jpg";
        }
        $producto->save();

        return redirect()->route('producto.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('producto.show', compact("producto"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        // dd($producto);
        $categorias= Categoria::where('estado', 1)->get();
        return view('producto.edit', compact("categorias", "producto"));

        //return view('producto/edit', compact("producto"));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->categoria_id=$request->categoria_id;
        $producto->marca=$request->marca;
        $producto->descripcion=$request->descripcion;
        // dd($request->all());
        if($request->hasFile('foto')){
            // dd(Storage::disk('public')->exists($producto->foto));
            if(Storage::disk('public')->exists($producto->foto)){
                Storage::disk('public')->delete($producto->foto);
            }
            $foto = $request->file('foto');
            $nombreImagen ='foto_productos/'.Str::random(20).'.jpg';
            $imagen =Image::make($foto)->encode('jpg',75);
            $imagen->resize(300,300,function($constraint){
                $constraint->upsize();
            });
            $fotillo = storage::disk('public')->put($nombreImagen, $imagen->stream());
            $producto->foto=$nombreImagen;
        }
        $producto->save();
        

        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EliminarRequest $request)
    {
        $producto=Producto::findOrfail($request->id);
        $producto->estado=0;
        $producto->save();
        return response()->json(["mensajito"=>"Registro eliminado correctamente", "categoria"=>$producto], 200);

    }
}
