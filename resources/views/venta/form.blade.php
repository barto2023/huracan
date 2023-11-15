{{-- inicio de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('cliente_id'))
        <span class="text-danger"> {{$errors->first('cliente_id')}}</span>
        @endif
    </div>
    {{-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
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
    </div> --}}
</div>

{{-- fin de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">           
            {{-- <input type="text" name="cliente_id" class="form-control @error('cliente_id') is-invalid @enderror" value="{{old('cliente_id', $cliente->id ?? '')}}"  id="floatingInput" placeholder="name@example.com"> --}}
            <select name="cliente_id" id="" class="form-control @error('cliente_id') is-invalid @enderror" value="{{old('cliente_id', $cliente_id ?? '')}}"  id="floatingInput" placeholder="name@example.com">
                {{-- @isset($venta)
                    <option value="">Seleccionar</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}" @if($cliente->id==$venta->cliente_id) {{'selected'}} @endif>{{$cliente->descripcion}}</option>
                    @endforeach
                @endisset   --}}
                <option value="">Seleccionar</option>
                @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->persona->nombre.' '.$cliente->persona->apellidos}}</option>
                @endforeach   
            </select>
            <label for="floatingInput">cliente</label>
        </div>   
    </div>
    {{-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="form-floating mb-3">
            <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{old('stock', $venta->stock ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Stock</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="form-floating mb-3">
            <input type="text" name="precio_compra" class="form-control @error('precio_compra') is-invalid @enderror" value="{{old('precio_compra', $venta->precio_compra ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">P_compra</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="form-floating mb-3">
            <input type="text" name="precio_venta" class="form-control @error('precio_venta') is-invalid @enderror" value="{{old('precio_venta', $venta->precio_venta ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">P_venta</label>
        </div>   
    </div> --}}
</div>
{{-- segunda fila --}}
