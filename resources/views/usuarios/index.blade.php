@extends('usuarios.template.main')

@section('title') 
    Listado
@endsection

@section('header')
    <h1>CRUD de Usuarios</h1>
@endsection

@section('content')

@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{Session::get('Mensaje')}}
    </div>
@endif

<a href="{{ url('api/usuarios/create')}}"  class="btn btn-primary">Agregar Usuario</a><br /><br />

<table class="table table-hover table-bordered">
    <thead>
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
                <th scope="row">{{$usuario->id}}</th>
                <td>{{$usuario->Nombre}}</td>
                <td>{{$usuario->Edad}}</td>
                <td>{{$usuario->RFC}}</td>
                <td>{{$usuario->Email}}</td>
                <td>{{$usuario->Telefono}}</td>
                <td>{{$usuario->estado->Estado}}</td>
                <td><a href="{{ url('/api/usuarios/'.$usuario->id.'/edit') }}" class="btn btn-success">Editar</a>
                    <form  method="post" action="{{ url('/api/usuarios/'.$usuario->id)}}" style="display:inline"> | 
                        <!-- Token -->
                        {{csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('Deseas Borrar?');" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
        <tr>
        @endforeach
    </tbody>
</table>

<!-- Paginación -->
{{ $usuarios->links() }}

@endsection

@section('footer')
    
@endsection