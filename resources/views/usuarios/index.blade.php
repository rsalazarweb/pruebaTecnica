
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<a href="{{ url('api/usuarios/create')}}">Agregar Usuario</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>RFC</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->Nombre}}</td>
                <td>{{$usuario->Edad}}</td>
                <td>{{$usuario->RFC}}</td>
                <td>{{$usuario->Email}}</td>
                <td>{{$usuario->Telefono}}</td>
                <td>{{$usuario->estado->Estado}}</td>
                <td><a href="{{ url('/api/usuarios/'.$usuario->id.'/edit') }}">Editar</a></td>
                <td>
                    <form  method="post" action="{{ url('/api/usuarios/'.$usuario->id)}}">
                        <!-- Token -->
                        {{csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('Deseas Borrar?');">Borrar</button>
                    </form>
                </td>
        <tr>
        @endforeach
    </tbody>
</table>


        

