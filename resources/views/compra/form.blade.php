{{-- inicio de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('proveedor_id'))
        <span class="text-danger"> {{$errors->first('proveedor_id')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        @if($errors->has('total'))
        <span class="text-danger"> {{$errors->first('total')}}</span>
        @endif
    </div>
</div>

{{-- fin de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">           
            <select name="proveedor_id" id="" class="form-control @error('proveedor_id') is-invalid @enderror" value="{{old('proveedor_id', $proveedor_id ?? '')}}"  id="floatingInput" placeholder="name@example.com">
                @isset($compra)
                    <option value="">Seleccionar</option>
                    @foreach ($proveedors as $proveedor)
                        <option value="{{$proveedor->id}}" @if($proveedor->id==$compra->proveedor_id) {{'selected'}} @endif>{{$proveedor->razon_social}}</option>
                    @endforeach
                @endisset  
                <option value="">Seleccionar</option>
                @foreach ($proveedors as $proveedor)
                    <option value="{{$proveedor->id}}">{{$proveedor->razon_social}}</option>
                @endforeach   
            </select>
            <label for="floatingInput">proveedor</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="form-floating mb-3">
            <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" value="{{old('total', $compra->total ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">total</label>
        </div>   
    </div>
    
</div>
