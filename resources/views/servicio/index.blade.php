
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop
@section('content_header')
    <h1>Lista servicios</h1>
@stop

@section('content')

    {{-- <p>Welcome to this beautiful admin panel.</p> --}}
    <div class="card">
        <div class="card-header">
            <a href="{{route('servicio.create')}}" class="">
            <button type="button" class="btn btn-primary me-md-2 pull-right">Nuevo</button>
            </a>       
        </div>
        <div class="card-body">
            <table id="tableservicios" class= "table table-bordered table-striped table-hover">
                {{-- <thead class= "bg-primary text-white">  --}}
                <thead> 
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>PRECIO</th>
                        <th>CREADO</th>
                        <th>ACTUALIZADO</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <TBody>
                    @foreach($servicios as $servicio)
                        <tr id="{{$servicio->id}}">
                            <td>{{$servicio->id}}</td>
                            <td>{{$servicio->nombre}}</td>
                            <td>{{$servicio->descripcion}}</td>
                            <td>{{$servicio->precio}}</td>
                            <td>{{$servicio->created_at}}</td>
                            <td>{{$servicio->created_at}}</td>

                            <td width="105px"> 
                                {{-- <a href="{{route('servicio.edit', $servicio->id)}}"> <i class="fa-solid fa-pen-to-square text-indigo"></i></a> --}}
                                <a href="{{route('servicio.edit', $servicio->id)}}" 
                                    class ="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                    <!--Editar-->    
                                </a>
                                {{-- <i class="fa-sharp fa-regular fa-eye text-success"></i> --}}
                                <a href="{{route('servicio.show', $servicio->id)}}" 
                                class="btn btn-success btn-sm" >
                                <i class="fa-solid fa-eye" ></i>
                                <!--ver-->
                                </a>
                                {{-- <i class="fa-sharp fa-solid fa-trash text-red"></i> --}}
                                <a href="" 
                                    class ="btn btn-danger btn-sm eliminar" >
                                    <i class="fas fa-trash"></i>
                                    <!--Borrar-->    
                                </a>     
                            </td>
                        </tr>
                    @endforeach
                    

                </TBody>
                <tfoot>
                    
                </tfoot>
            </table>
           

        </div>
        <div class="card-footer">
            pie de pagina tabla
        </div>
    </div>
    
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let tableservicio= new DataTable('#tableservicios',{
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            },
       });

        $(document).ready(function()
        { 
            $("#tableservicios").on("click",".eliminar", function(e){
                e.preventDefault();
                console.log($(this).closest("tr").attr('id'));
                $id =$(this).closest("tr").attr('id');               
                Swal.fire({
                    title: 'Estas seguro de eliminar?',
                    text: "Una vez eliminado no podras recuperar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : "{{route('servicio.destroy')}}",
                            data : { id :$id},
                            type : 'GET',
                            datatype : 'json',
                            success : function(respuesta) {
                                // Swal.fire(
                                // 'Eliminado!',
                                // 'Su archivo ha sido eliminado correctamente.',
                                // 'success'
                                // )          
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })
                                 Toast.fire({
                                    icon: 'success',
                                    title: respuesta.mensajito
                                    })

                                $("#"+$id).remove();
                            },
                            error : function(xhr, status) {
                                alert('Disculpe, existió un problema');
                            },
                        });    
                    }    
                })       
            });
        });
    </script>
@stop