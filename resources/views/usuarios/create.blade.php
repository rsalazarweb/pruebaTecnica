@extends('usuarios.template.main')

@section('title') 
    Crear
@endsection

@section('header')
<h1>Creación de usuarios</h1>
@endsection

@section('content')
<form method="post" action="{{ url('/api/usuarios')}}" class="form-horizontal">
    <!-- token de seguridad -->
    {{csrf_field() }}
    <!-- incluyo form.blade para reutilizar código del form -->
    @include('usuarios.form', ['Modo'=>'crear'])

</form>
@endsection