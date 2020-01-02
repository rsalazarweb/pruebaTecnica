{{ $Modo=='crear' ? 'Agregar Usuario':'Modificar Usuario'}}
    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" value="{{ isset($usuario->Nombre)?$usuario->Nombre:'' }}" >

    <label for="Edad">{{'Edad'}}</label>
    <input type="text" name="Edad" value="{{ isset($usuario->Edad)?$usuario->Edad:'' }} ">

    <label for="RFC">{{'RFC'}}</label>
    <input type="text" name="RFC" value="{{ isset($usuario->RFC)?$usuario->RFC: '' }} ">

    <label for="Email">{{'Email'}}</label>
    <input type="text" name="email" value="{{ isset($usuario->Email)?$usuario->Email: '' }} ">

    <label for="Password">{{'Password'}}</label>
    <input type="password" name="Password" value="{{ isset($usuario->Password)?$usuario->Password:'' }}">

    <label for="Telefono">{{'Telefono'}}</label>
    <input type="text" name="Telefono" value="{{ isset($usuario->Telefono)?$usuario->Telefono:'' }} ">

    <label for="Estado">{{'Estado'}}</label>
    <input type="text" name="estado_id" value="{{ isset($usuario->estado->Estado)?$usuario->estado->Estado:'' }} ">
    

    <input type="submit" value="{{ $Modo=='crear' ? 'Agregar':'Modificar'}}">


    <br>

    <a href="{{ url('api/usuarios')}}">Regresar</a>