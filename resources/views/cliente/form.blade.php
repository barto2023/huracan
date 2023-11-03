{{-- inicio de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('persona_id'))
        <span class="text-danger"> {{$errors->first('persona_id')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        @if($errors->has('razon_social'))
        <span class="text-danger"> {{$errors->first('razon_social')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        @if($errors->has('nit'))
        <span class="text-danger"> {{$errors->first('nit')}}</span>
        @endif
    </div>
</div>

{{-- fin de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">           
            {{-- <input type="text" name="persona_id" class="form-control @error('persona_id') is-invalid @enderror" value="{{old('persona_id', $persona->id ?? '')}}"  id="floatingInput" placeholder="name@example.com"> --}}
            <select name="persona_id" id="" class="form-control @error('persona_id') is-invalid @enderror" value="{{old('persona_id', $persona_id ?? '')}}"  id="floatingInput" placeholder="name@example.com">
                @isset($cliente)
                    <option value="">Seleccionar</option>
                    @foreach ($personas as $persona)
                        <option value="{{$persona->id}}" @if($persona->id==$cliente->persona_id) {{'selected'}} @endif>{{$persona->nombre.' '.$persona->apellidos}}</option>
                    @endforeach
                @endisset  
                <option value="">Seleccionar</option>
                @foreach ($personas as $persona)
                    <option value="{{$persona->id}}">{{$persona->nombre.' '. $persona->apellidos}}</option>
                @endforeach   
            </select>
            <label for="floatingInput">Persona</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="form-floating mb-3">
            <input type="text" name="razon_social" class="form-control @error('razon_social') is-invalid @enderror" value="{{old('razon_social', $cliente->razon_social ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Razon_social</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="form-floating mb-3">
            <input type="text" name="nit" class="form-control @error('nit') is-invalid @enderror" value="{{old('nit', $cliente->nit ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Nit</label>
        </div>   
    </div>
    
</div>
{{-- segunda fila --}}
{{-- <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('foto'))
        <span class="text-danger"> {{$errors->first('foto')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{old('foto', $cliente->foto ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Foto</label>
        </div>   
    </div>
   
</div> --}}