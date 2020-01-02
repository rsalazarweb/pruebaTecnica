

    <div class="form-group">
        <label for="Nombre" class="control-label">{{'Nombre'}}</label>
        <input type="text" class="form-control" name="Nombre" value="{{ isset($usuario->Nombre)?$usuario->Nombre:'' }}" >

        <label for="Edad" class="control-label">{{'Edad'}}</label>
        <input type="text" class="form-control" name="Edad" value="{{ isset($usuario->Edad)?$usuario->Edad:'' }} ">

        <label for="RFC" class="control-label">{{'RFC'}}</label>
        <input type="text" class="form-control" name="RFC" value="{{ isset($usuario->RFC)?$usuario->RFC: '' }} ">
    </div>

    <div class="form-group">
        <label for="Email" class="control-label">{{'Email'}}</label>
        <input type="text" class="form-control" name="Email" value="{{ isset($usuario->Email)?$usuario->Email:'' }}">
        
        <label for="Password" class="control-label">{{'Password'}}</label>
        <input type="password" class="form-control" name="Password" value="" {{ !isset($usuario->Password)?'required':'' }}>
        
        <label for="Telefono" class="control-label">{{'Telefono'}}</label>
        <input type="text" class="form-control" name="Telefono" value="{{ isset($usuario->Telefono)?$usuario->Telefono:'' }} ">
    </div>
    
    <div class="form-group">
        <label for="Estado" class="control-label">{{'Estado'}}</label>
        <select name="estado_id" id="" class="form-control" >
        <option value="">--Selecciona Estado --</option>
        @foreach($estados as $estado)
        <option value="{{$estado->id}}" @if ($estado->id == $usuario->estado->id) selected @endif>
            {{$estado->Estado}}
        </option>
        @endforeach
    </div>
    </select>
    
    <div class="form-group" style="margin-top:30px;">
        <input type="submit" value="{{ $Modo=='crear' ? 'Agregar':'Modificar'}}" class="btn btn-success">
        <a href="{{ url('api/usuarios')}}" class="btn btn-primary">Regresar</a><br><br>
    </div>