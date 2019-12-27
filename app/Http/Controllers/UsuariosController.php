<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usuario;

class UsuariosController extends Controller
{
    

    public function register(Request $request)
    {

        //Recoger datos de usuario por POST
        $json = $request->input('json', null);
        //var_dump($json);
        $params = json_decode($json); //Saco el objeto

        $params_array = json_decode($json,true); //array de los datos

        //Validar datos


        //Cifrar contraseña

        //Comprobar usuario duplicado

        //Código de error HTTP


        //Crear al usuario
        $data  = array(
            'status' => 'error',
            'code' => 404,
            'message' => 'El usuario no se ha creado correctamente'
        );

        return response()->json($data, $data['code']);
    }

}
