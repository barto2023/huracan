<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
// use Intervention\Image\ImageManagerStatic as Image;
// use Intervention\Image\ImageManager;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// rutas de categorias inicio
route::get('categorias/index', [CategoriaController::class, 'index'])->name("categoria.index");
route::get('categoria/create', [CategoriaController::class, 'create'])->name("categoria.create");
route::post('categoria/store', [CategoriaController::class, 'store'])->name("categoria.store");
route::get('categoria/edit/{categoria}', [CategoriaController::class, 'edit'])->name("categoria.edit");
route::get('categoria/show/{categoria}', [CategoriaController::class, 'show'])->name("categoria.show");
route::GET('categoria/update/{categoria}', [CategoriaController::class, 'update'])->name("categoria.update");
route::get('categoria/destroy', [CategoriaController::class, 'destroy'])->name("categoria.destroy");
// fin de rutas de categorias

//inicio de rutas productos
route::get('productos/index', [ProductoController:: class, 'index'])->name("producto.index");
route::get('producto/create', [ProductoController:: class, 'create'])->name("producto.create");
route::post('producto/store', [ProductoController:: class, 'store'])->name("producto.store");
route::get('producto/edit/{producto}', [ProductoController:: class, 'edit'])->name("producto.edit");
route::put('producto/update/{producto}', [ProductoController:: class, 'update'])->name("producto.update");
route::get('producto/destroy', [ProductoController:: class, 'destroy'])->name("producto.destroy");
route::get('producto/show/{producto}', [ProductoController:: class, 'show'])->name("producto.show");
// Route::get('/foto', function() {
// // phpinfo();
//     $img = Image::make('foo.jpg')->resize(300, 200);
//     return $img->response('jpg');
// });
//fin rutas productos
//------------------------------------------------------------------------------------------------
//inicio rutas ciudad
route::get('ciudads/index', [CiudadController:: class, 'index'])->name("ciudad.index");
route::get('ciudad/create', [CiudadController:: class, 'create'])->name("ciudad.create");
route::post('ciudad/store', [CiudadController:: class, 'store'])->name("ciudad.store");
route::get('ciudad/update/{ciudad}', [CiudadController:: class, 'update'])->name("ciudad.update");
route::get('ciudad/edit/{ciudad}', [CiudadController:: class, 'edit'])->name("ciudad.edit");
route::get('ciudad/show/{ciudad}', [CiudadController:: class, 'show'])->name("ciudad.show");
route::get('ciudad/destroy', [CiudadController:: class, 'destroy'])->name("ciudad.destroy");
// fin rutas ciudad
//------------------------------------------------------------------------------------------------
//inicio rutas persona
route::get('personas/index', [PersonaController:: class, 'index'])->name("persona.index");
route::get('persona/create', [PersonaController:: class, 'create'])->name("persona.create");
route::post('persona/store', [PersonaController:: class, 'store'])->name("persona.store");
route::get('persona/edit/{persona}', [PersonaController:: class, 'edit'])->name("persona.edit");
route::get('persona/update/{persona}', [PersonaController:: class, 'update'])->name("persona.update");
route::get('persona/show/{persona}', [PersonaController:: class, 'show'])->name("persona.show");
route::get('persona/destroy', [PersonaController:: class, 'destroy'])->name("persona.destroy");
// fin ruta personas
//-------------------------------------------------------------------------------------------------
//inicio de rutas cliente
route::get('clientes/index', [ClienteController:: class, 'index'])->name("cliente.index");
route::get('cliente/create', [ClienteController:: class, 'create'])->name("cliente.create");
route::post('cliente/store', [ClienteController:: class, 'store'])->name("cliente.store");
route::get('cliente/edit/{cliente}', [ClienteController:: class, 'edit'])->name("cliente.edit");
route::get('cliente/update/{cliente}', [ClienteController:: class, 'update'])->name("cliente.update");
route::get('cliente/show/{cliente}', [ClienteController:: class, 'show'])->name("cliente.show");
route::get('cliente/destroy', [ClienteController:: class, 'destroy'])->name("cliente.destroy");
//fin rutas cliente
//----------------------------------------------------------------------------------------------------------
//inicio de rutas proveeedores
route::get('proveedors/index', [ProveedorController:: class, 'index'])->name("proveedor.index");
route::get('proveedor/create', [ProveedorController:: class, 'create'])->name("proveedor.create");
route::post('proveedor/store', [ProveedorController:: class, 'store'])->name("proveedor.store");
route::get('proveedor/edit/{proveedor}', [ProveedorController:: class, 'edit'])->name("proveedor.edit");
route::get('proveedor/update/{proveedor}', [ProveedorController:: class, 'update'])->name("proveedor.update");
route::get('proveedor/show/{proveedor}', [ProveedorController:: class, 'show'])->name("proveedor.show");
route::get('proveedor/destroy', [ProveedorController:: class, 'destroy'])->name("proveedor.destroy");
//fin de rutas proveedores

Auth::routes(); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
