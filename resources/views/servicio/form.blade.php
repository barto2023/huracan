{{-- inicio de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        @if($errors->has('nombre'))
        <span class="text-danger"> {{$errors->first('nombre')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-7">
        @if($errors->has('descripcion'))
        <span class="text-danger"> {{$errors->first('descripcion')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        @if($errors->has('precio'))
        <span class="text-danger"> {{$errors->first('precio')}}</span>
        @endif
    </div>
   
</div>

{{-- fin de validacion --}}

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="form-floating mb-3">
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre', $persona->nombre ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Nombre</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-7">
        <div class="form-floating mb-3">
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('descripcion', $persona->descripcion ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Descripcion</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="form-floating mb-3">
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio', $persona->precio ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Precio</label>
        </div>   
    </div>
    
</div>
{{-- otra fila de formulario --}}
