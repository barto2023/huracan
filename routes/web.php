<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\Detalle_compraController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleVentaController;

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
//----------------------------------------------------------------------------------------------------------------
//inicio de rutas tecnicos
route::get('tecnicos/index', [TecnicoController:: class, 'index'])->name("tecnico.index");
route::get('tecnico/create', [TecnicoController:: class, 'create'])->name("tecnico.create");
route::post('tecnico/store', [TecnicoController:: class, 'store'])->name("tecnico.store");
route::get('tecnico/edit/{tecnico}', [TecnicoController:: class, 'edit'])->name("tecnico.edit");
route::get('tecnico/update{tecnico}', [TecnicoController:: class, 'update'])->name("tecnico.update");
route::get('tecnico/show/{tecnico}', [TecnicoController:: class, 'show'])->name("tecnico.show");
route::get('tecnico/destroy', [TecnicoController:: class, 'destroy'])->name("tecnico.destroy");
// fin rutas tecnicos
//-------------------------------------------------------------------------------------------------------
// inicio rutas servicios
route::get('servicios/index', [ServicioController:: class, 'index'])->name("servicio.index");
route::get('servicio/create', [ServicioController:: class, 'create'])->name("servicio.create");
route::post('servicio/store', [ServicioController:: class, 'store'])->name("servicio.store");
route::get('servicio/edit/{servicio}', [ServicioController:: class, 'edit'])->name("servicio.edit");
route::get('servicio/update/{servicio}', [ServicioController:: class, 'update'])->name("servicio.update");
route::get('servicio/show/{servicio}', [ServicioController:: class, 'show'])->name("servicio.show");
route::get('servicio/destroy', [ServicioController:: class, 'destroy'])->name("servicio.destroy");
// fin de ruta servicios
//-------------------------------------------------------------------------------------------------------------
// inicio rutas compra
route::get('compras/index', [CompraController:: class, 'index'])->name("compra.index");
route::get('compra/create', [CompraController:: class, 'create'])->name("compra.create");
route::post('compra/store', [CompraController:: class, 'store'])->name("compra.store");
route::get('compra/edit/{compra}', [CompraController:: class, 'edit'])->name("compra.edit");
route::get('compra/update/{compra}', [CompraController:: class, 'update'])->name("compra.update");
route::get('compra/show/{compra}', [CompraController:: class, 'show'])->name("compra.show");
route::get('compra/destroy', [CompraController:: class, 'destroy'])->name("compra.destroy");
// fin rutas compra
//------------------------------------------------------------------------------------------------------
//inicio rutas detalle_compras
route::get('detalle_compras/index', [Detalle_compraController:: class, 'index'])->name("detalle_compra.index");
route::get('detalle_compra/create', [Detalle_compraController:: class, 'create'])->name("detalle_compra.create");
route::post('detall_compra/store', [Detalle_compraController:: class, 'store'])->name("detalle_compra.store");
route::get('detalle_compra/edit/{detalle_compra}', [Detalle_compraController:: class, 'edit'])->name("detalle_compra.edit");
route::get('detalle_compra/update/{detalle_compra}', [Detalle_compraController:: class, 'update'])->name("detalle_compra.update");
route::get('detalle_compra/show/{detalle_compra}', [Detalle_compraController:: class, 'show'])->name("detalle_compra.show");
route::get('detalle_compra/destroy', [Detalle_compraController:: class, 'destroy'])->name("detalle_compra.destroy");
// fin rutas detalle_compras
//----------------------------------------------------------------------------------------------------------------------------------
//inicio rutas inventario
route::get('inventarios/index', [InventarioController:: class, 'index'])->name("inventario.index");
route::get('inventario/create', [InventarioController:: class, 'create'])->name("inventario.create");
route::post('inventario/store', [InventarioController:: class, 'store'])->name("inventario.store");
route::get('inventario/edit/{inventario}', [InventarioController:: class, 'edit'])->name("inventario.edit");
route::get('inventario/update/{inventario}', [InventarioController:: class, 'update'])->name("inventario.update");
route::get('inventario/show/{inventario}', [InventarioController:: class, 'show'])->name("inventario.show");
route::get('inventario/destroy', [InventarioController:: class, 'destroy'])->name("inventario.destroy");
//fin de rutas inventario
//---------------------------------------------------------------------------------------------------------------------
//inicio rutas ventas
route::get('ventas/index', [VentaController:: class, 'index'])->name("venta.index");
route::get('venta/create', [VentaController:: class, 'create'])->name("venta.create");
route::post('venta/store', [VentaController:: class, 'store'])->name("venta.store");
route::get('venta/edit/{venta}', [VentaController:: class, 'edit'])->name("venta.edit");
route::get('venta/update/{venta}', [VentaController:: class, 'update'])->name("venta.update");
route::get('venta/show/{venta}', [VentaController:: class, 'show'])->name("venta.show");
route::get('venta/destroy', [VentaController:: class, 'destroy'])->name("venta.destroy");
//fin rutas venta
//----------------------------------------------------------------------------------------------------------------------
//inicio rutas detalle_ventas
route::get('detalle_ventas/index', [DetalleVentaController:: class, 'index'])->name("detalle_venta.index");
route::get('detalle_venta/create', [DetalleVentaController:: class, 'create'])->name("detalle_venta.create");
route::post('detalle_venta/store', [DetalleVentaController:: class, 'store'])->name("detalle_venta.store");
route::get('detalle_venta/edit/{detalle_venta}', [DetalleVentaController:: class, 'edit'])->name("detalle_venta.edit");
route::get('detalle_venta/update/{detalle_venta}', [DetalleVentaController:: class, 'update'])->name("detalle_venta.update");
route::get('detalle_venta/show/{detalle_venta', [DetalleVentaController:: class, 'edit'])->name("detalle_venta.edit");
route::get('detalle_venta/destroy', [DetalleVentaController:: class, 'destroy'])->name("detalle_venta.destroy");

Auth::routes(); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
