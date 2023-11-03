{{-- inicio de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        @if($errors->has('categoria_id'))
        <span class="text-danger"> {{$errors->first('categoria_id')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        @if($errors->has('marca'))
        <span class="text-danger"> {{$errors->first('marca')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('descripcion'))
        <span class="text-danger"> {{$errors->first('descripcion')}}</span>
        @endif
    </div>
</div>

{{-- fin de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="form-floating mb-3">           
            {{-- <input type="text" name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror" value="{{old('categoria_id', $categoria->id ?? '')}}"  id="floatingInput" placeholder="name@example.com"> --}}
            <select name="categoria_id" id="" class="form-control @error('categoria_id') is-invalid @enderror" value="{{old('categoria_id', $categoria_id ?? '')}}"  id="floatingInput" placeholder="name@example.com">
                @isset($producto)
                    <option value="">Seleccionar</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}" @if($categoria->id==$producto->categoria_id) {{'selected'}} @endif>{{$categoria->nombre}}</option>
                    @endforeach
                @endisset  
                <option value="">Seleccionar</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach   
            </select>
            <label for="floatingInput">Categoria</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="form-floating mb-3">
            <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror" value="{{old('marca', $producto->marca ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Marca</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('descripcion', $producto->descripcion ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Descripcion</label>
        </div>   
    </div>
    
</div>
{{-- segunda fila --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('foto'))
        <span class="text-danger"> {{$errors->first('foto')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{old('foto', $producto->foto ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Foto</label>
        </div>   
    </div>
   
</div>