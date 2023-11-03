{{-- //inicio validacion de campos --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('nombre'))
        <span class="text-danger"> {{$errors->first('nombre')}}</span>
        @endif
    </div>


    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('estado'))
        <span class="text-danger"> {{$errors->first('estado')}}</span>
        @endif
    </div>
</div>
{{-- //fin de validacion de campos --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre', $categoria->nombre ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Nombre</label>
          </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">          
                <select class="form-control @error('estado') is-invalid @enderror" name="estado" id="" value="{{old('estado', $categoria->estado ?? '')}}">
                    @isset($categoria)
                        @if($categoria->estado=="1") 
                            <option value="0">inactivo</option>
                            <option value="1" selected>activo</option>
                        @else
                            <option value="0" selected>inactivo</option>
                            <option value="1">activo</option>   
                        @endif
                    @endisset
                    <option value="">seleccione un  estado</option>
                    <option value="1   ">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            <label for="floatingInput">Estado</label>
        </div>
    </div>
    
</div>

