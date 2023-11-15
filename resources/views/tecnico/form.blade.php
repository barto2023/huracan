{{-- inicio de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('persona_id'))
        <span class="text-danger"> {{$errors->first('persona_id')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        @if($errors->has('telefono'))
        <span class="text-danger"> {{$errors->first('telefono')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        @if($errors->has('rol'))
        <span class="text-danger"> {{$errors->first('rol')}}</span>
        @endif
    </div>
    
</div>

{{-- fin de validacion --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">           
            {{-- <input type="text" name="persona_id" class="form-control @error('persona_id') is-invalid @enderror" value="{{old('persona_id', $persona->id ?? '')}}"  id="floatingInput" placeholder="name@example.com"> --}}
            <select name="persona_id" id="" class="form-control @error('persona_id') is-invalid @enderror" value="{{old('persona_id', $persona_id ?? '')}}"  id="floatingInput" placeholder="name@example.com">
                @isset($tecnico)
                    <option value="">Seleccionar</option>
                    @foreach ($personas as $persona)
                        <option value="{{$persona->id}}" @if($persona->id==$tecnico->persona_id) {{'selected'}} @endif>{{$persona->nombre.' '.$persona->apellidos}}</option>
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
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono', $tecnico->telefono ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">telefono</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="form-floating mb-3">
            <input type="text" name="rol" class="form-control @error('rol') is-invalid @enderror" value="{{old('rol', $tecnico->rol ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Rol</label>
        </div>   
    </div>
   
    
</div>
{{-- segunda fila --}}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        @if($errors->has('correo'))
        <span class="text-danger"> {{$errors->first('correo')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        @if($errors->has('password'))
        <span class="text-danger"> {{$errors->first('password')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
        <div class="form-floating mb-3">
            <input type="text" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{old('correo', $tecnico->correo ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Correo</label>
        </div>   
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="form-floating mb-3">
            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password', $tecnico->password ?? '')}}"  id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Password</label>
        </div>   
    </div>
</div>