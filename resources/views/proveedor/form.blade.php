{{-- inicio de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        @if($errors->has('ciudad_id'))
        <span class="text-danger"> {{$errors->first('ciudad_id')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-5">
        @if($errors->has('razon_social'))
        <span class="text-danger"> {{$errors->first('razon_social')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        @if($errors->has('nit'))
        <span class="text-danger"> {{$errors->first('nit')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        @if($errors->has('telefono'))
        <span class="text-danger"> {{$errors->first('telefono')}}</span>
        @endif
    </div>
    
</div>

{{-- fin de validacion --}}

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="form-floating mb-3">           
            <select name="ciudad_id" id="" class="form-control @error('ciudad_id') is-invalid @enderror" value="{{old('ciudad_id', $ciudad_id ?? '')}}"  id="floatingInput" placeholder="name@example.com">
                @isset($proveedor)
                    <option value="">Seleccionar</option>
                    @foreach ($ciudads as $ciudad)
                        <option value="{{$ciudad->id}}" @if($ciudad->id==$proveedor->ciudad_id) {{'selected'}} @endif>{{$ciudad->nombre}}</option>
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
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-5">
        <div class="form-floating mb-3">
            <input type="text" name="razon_social" class="form-control @error('razon_social') is-invalid @enderror" value="{{old('razon_social', $proveedor->razon_social ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Razon social</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="form-floating mb-3">
            <input type="text" name="nit" class="form-control @error('nit') is-invalid @enderror" value="{{old('nit', $proveedor->nit ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Nit</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="form-floating mb-3">
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono', $proveedor->telefono ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Telefono</label>
        </div>   
    </div>
    
    
</div>
{{-- otra fila de formulario --}}
{{-- inicio validacion --}}
<div class="row">
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
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{old('direccion', $proveedor->direccion ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Direccion</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="form-floating mb-3">
            <input type="text" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{old('correo', $proveedor->correo ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Correo</label>
        </div>   
    </div>
   
</div>