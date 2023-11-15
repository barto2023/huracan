{{-- inicio de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('producto_id'))
        <span class="text-danger"> {{$errors->first('producto_id')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        @if($errors->has('stock'))
        <span class="text-danger"> {{$errors->first('stock')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        @if($errors->has('precio_compra'))
        <span class="text-danger"> {{$errors->first('precio_compra')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        @if($errors->has('precio_venta'))
        <span class="text-danger"> {{$errors->first('precio_venta')}}</span>
        @endif
    </div>
</div>

{{-- fin de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">           
            {{-- <input type="text" name="producto_id" class="form-control @error('producto_id') is-invalid @enderror" value="{{old('producto_id', $producto->id ?? '')}}"  id="floatingInput" placeholder="name@example.com"> --}}
            <select name="producto_id" id="" class="form-control @error('producto_id') is-invalid @enderror" value="{{old('producto_id', $producto_id ?? '')}}"  id="floatingInput" placeholder="name@example.com">
                @isset($inventario)
                    <option value="">Seleccionar</option>
                    @foreach ($productos as $producto)
                        <option value="{{$producto->id}}" @if($producto->id==$inventario->producto_id) {{'selected'}} @endif>{{$producto->descripcion}}</option>
                    @endforeach
                @endisset  
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
            <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{old('stock', $inventario->stock ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Stock</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="form-floating mb-3">
            <input type="text" name="precio_compra" class="form-control @error('precio_compra') is-invalid @enderror" value="{{old('precio_compra', $inventario->precio_compra ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">P_compra</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="form-floating mb-3">
            <input type="text" name="precio_venta" class="form-control @error('precio_venta') is-invalid @enderror" value="{{old('precio_venta', $inventario->precio_venta ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">P_venta</label>
        </div>   
    </div>
</div>
{{-- segunda fila --}}
