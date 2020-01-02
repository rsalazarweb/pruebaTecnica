@extends('usuarios.template.main')

@section('title') 
    Editar
@endsection

@section('header')
<h1>Editar Usuarios</h1>
@endsection

@section('content')
<form method="post" action="{{ url('/api/usuarios/' . $usuario->id ) }}" class="form-horizontal">
    <!-- token de seguridad -->
    {{csrf_field() }}
    <!-- envio del metodo PATCH para acceder al update -->
    {{ method_field('PATCH') }}

    @include('usuarios.form', ['Modo'=>'editar'])
</form>

@endsection