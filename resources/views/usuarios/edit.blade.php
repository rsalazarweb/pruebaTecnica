<h1>Editar Usuarios</h1>


<form method="post" action="{{ url('/api/usuarios/' . $usuario->id ) }}">
    <!-- token de seguridad -->
    {{csrf_field() }}
    <!-- envio del metodo PATCH para acceder al update -->
    {{ method_field('PATCH') }}

    @include('usuarios.form', ['Modo'=>'editar'])


    

</form>