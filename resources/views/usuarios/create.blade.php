<h1>Creaciòn de usuarios</h1>

<form method="post" action="{{ url('/api/usuarios')}}">
    <!-- token de seguridad -->
    {{csrf_field() }}
    <!-- incluyo form.blade para reutilizar código del form -->
    @include('usuarios.form', ['Modo'=>'crear'])

</form>

