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
            {{-- {{$compra}} --}}
        <div class="card-header titulos">
                    <i class="fa-solid fa-motorcycle"></i>
                    Editar compras
        </div>
        <div class="card-body">
            <form action="{{route('compra.update', $compra->id)}}" method="GET">
                @csrf
                @include ("compra.form")
                {{-- @include("include.buttonGuardar") --}}
            </form>
        </div>

    </div>
    <div class="row">
      
        <form action="{{route('detalle_compra.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                    <div class="form-floating mb-3">           
                        <select name="producto_id" id="" class="form-control @error('producto_id') is-invalid @enderror" value="{{old('producto_id', $producto_id ?? '')}}"  id="floatingInput" placeholder="name@example.com">
                            {{-- @isset($compra)
                                <option value="">Seleccionar</option>
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->id}}" @if($producto->id==$compra->producto_id) {{'selected'}} @endif>{{$producto->descripcion}}</option>
                                @endforeach
                            @endisset   --}}
                            <option value="">Seleccionar</option>
                            @foreach ($productos as $producto)
                                <option value="{{$producto->id}}">{{$producto->descripcion}}</option>
                            @endforeach   
                        </select>
                        <label for="floatingInput">Producto</label>
                    </div>   
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="form-floating mb-3">
                        <input type="text" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{old('cantidad', $compra->cantidad ?? '')}}"  id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Cantidad</label>
                    </div>   
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="form-floating mb-3">
                        <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio', $compra->precio ?? '')}}"  id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Precio</label>
                    </div>   
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    <input type="hidden" name="compra_id" value="{{$compra->id}}">
                    <button type="submit" class="btn btn-primary btn-sm mt-4 btn-block">
                        <i class="fas fa-plus"></i>Agregar
                    </button>
                    {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="submit">Agregar</button>
                    </div>   --}}
                </div>
            </div>
        </form>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>DESCRIPCION</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detalle_compra as $detalle)
                    <tr>
                        <td>{{$detalle->producto->descripcion}}</td>
                        <td>{{$detalle->cantidad}}</td>
                        <td>{{$detalle->precio}}</td>
                        <td>{{$detalle->subtotal}}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
       
       

    </div>
    
    
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop