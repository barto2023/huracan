{{-- inicio de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        @if($errors->has('nombre'))
        <span class="text-danger"> {{$errors->first('nombre')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        @if($errors->has('apellidos'))
        <span class="text-danger"> {{$errors->first('apellidos')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        @if($errors->has('carnet'))
        <span class="text-danger"> {{$errors->first('carnet')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        @if($errors->has('ciudad_id'))
        <span class="text-danger"> {{$errors->first('ciudad_id')}}</span>
        @endif
    </div>
</div>

{{-- fin de validacion --}}

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="form-floating mb-3">
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre', $persona->nombre ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Nombre</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="form-floating mb-3">
            <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" value="{{old('apellidos', $persona->apellidos ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Apellidos</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="form-floating mb-3">
            <input type="text" name="carnet" class="form-control @error('carnet') is-invalid @enderror" value="{{old('carnet', $persona->carnet ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Numero C.I.</label>
        </div>   
    </div>
     <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="form-floating mb-3">           
            <select name="ciudad_id" id="" class="form-control @error('ciudad_id') is-invalid @enderror" value="{{old('ciudad_id', $ciudad_id ?? '')}}"  id="floatingInput" placeholder="name@example.com">
                @isset($persona)
                    <option value="">Seleccionar</option>
                    @foreach ($ciudads as $ciudad)
                        <option value="{{$ciudad->id}}" @if($ciudad->id==$persona->ciudad_id) {{'selected'}} @endif>{{$ciudad->nombre}}</option>
                    @endforeach
                @endisset  
                <option value="">Seleccionar</option>
                @foreach ($ciudads as $ciudad)
                    <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                @endforeach   
            </select>
            <label for="floatingInput">Ciudad</label>
        </div>   
    </div>
    
</div>
{{-- otra fila de formulario --}}
{{-- inicio validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        @if($errors->has('telefono'))
        <span class="text-danger"> {{$errors->first('telefono')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('direccion'))
        <span class="text-danger"> {{$errors->first('direccion')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        @if($errors->has('correo'))
        <span class="text-danger"> {{$errors->first('correo')}}</span>
        @endif
    </div>
</div>
{{-- fin validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="form-floating mb-3">
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono', $persona->telefono ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Telefono</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{old('direccion', $persona->direccion ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Direccion</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="form-floating mb-3">
            <input type="text" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{old('correo', $persona->correo ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Correo</label>
        </div>   
    </div>
   
</div>