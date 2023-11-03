@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    {{-- <p>Welcome to this beautiful admin panel.</p> --}}
    <div class="card">
        <div class="card-header text-white bg-success">
            Categoria id:
         {{$categoria->id}}
         {{-- {{$categoria}} para verificar --}}
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <th>#</th>
                    <th>ATRIBUTO</th>
                    <th>VALOR</th>
                </thead>
                <Tbody>
                    <tr>
                        <td>1</td>
                        <td>NOMBRE</td>
                        <td>{{$categoria->nombre}}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>ESTADO</td>
                        <td>{{$categoria->estado}}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>CREADO</td>
                        <td>{{$categoria->created_at}}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>ACTUALIZADO</td>
                        <td>{{$categoria->updated_at}}</td>
                    </tr>
                </Tbody>

            </table>

        </div>

    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
