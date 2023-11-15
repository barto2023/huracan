@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{('css/custom.css')}}">
@stop
@section('content_header')
    {{-- <h1>editar</h1> --}}
@stop

@section('content') 
    <div class="card">
            {{-- {{$venta}} --}}
        <div class="card-header titulos">
                    <i class="fa-solid fa-motorcycle"></i>
                    Editar ventas
        </div>
        <div class="card-body">
            <form action="{{route('venta.update', $venta->id)}}" method="GET">
                @csrf
                @include ("venta.form")
                {{-- @include("include.buttonGuardar") --}}
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('detalle_venta.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-7">
                        <label for="">Producto</label>
                        <select name="id_inventario" id="" class="select-multiple" required>
                            <option value="">Seleccionar</option>
                            @foreach($inventarios as $inventario)
                            <option value="{{$inventario->id}}">
                                {{$inventario->producto->marca.'  -  '.$inventario->producto->descripcion.'  - (Bs: '.$inventario->precio_venta.'  - Stock:'.$inventario->stock.'  lote:'.$inventario->id.')'}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for="">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-2">
                        <input type="hidden" name="id_venta" value="{{$venta->id}}">
                        <button type="submit" class="btn btn-primary btn-sm mt-4 btn-block">
                            <i class="fas fa-plus"></i>Agregar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <form action="{{route('detalle_venta.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-7">
                        <label for="">Servicio</label>
                        <select name="id_servicio" id="" class="select-multiple" required>
                            <option value="">Seleccionar</option>
                            @foreach($servicios as $servicio)
                            <option value="{{$servicio->id}}">
                                {{$servicio->nombre.' -  '.$servicio->descripcion.'   -  (Bs:'.$servicio->precio.' )'}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for="">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-2">
                        <input type="hidden" name="id_venta" value="{{$venta->id}}">
                        <button type="submit" class="btn btn-primary btn-sm mt-4 btn-block">
                            <i class="fas fa-plus"></i>Agregar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
           
    
       <hr>
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio/U.</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->detalle_venta as $detalle)
            @if($detalle->id_inventario)
            <tr>
                <td>{{$detalle->inventario->producto->marca.' - '.$detalle->inventario->producto->descripcion}}</td>
                <td>{{$detalle->cantidad}}</td>
                <td>{{$detalle->inventario->precio_venta}}</td>
                <td>{{number_format($detalle->subtotal, 2)}}</td>
            </tr>
            @elseif($detalle->id_servicio)
            <tr>
                <td>{{$detalle->servicio->nombre.' - '.$detalle->servicio->descripcion}}</td>
                <td>{{$detalle->cantidad}}</td>
                <td>{{$detalle->servicio->precio}}</td>
                <td>{{number_format($detalle->subtotal, 2)}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td>Total</td>
                <td>Bs.{{number_format($venta->detalle_venta->sum('subtotal'), 2)}}</td>
            </tr>
        </tfoot>
       </table>
    
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-3">
            <a href="{{route('venta.confirmar', $venta->id)}}" class="btn btn-success btn-block">Registrar</a>
        </div>
        <div class="col-md-3">
            <a href="{{route('venta.cancelar', $venta->id)}}" class="btn btn-danger btn-block">Cancelar</a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop