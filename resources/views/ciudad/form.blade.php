{{-- //inicio validacion de campos --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('nombre'))
        <span class="text-danger"> {{$errors->first('nombre')}}</span>
        @endif
    </div>
</div>
{{-- //fin de validacion de campos --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre', $ciudad->nombre ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Nombre</label>
          </div>   
    </div>
    
    
</div>

