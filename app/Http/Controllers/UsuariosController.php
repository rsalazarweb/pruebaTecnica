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

        if(!empty($params) && !empty($params_array))
        {
            //Limpiar datos
            $params_array = array_map('trim', $params_array);

            //Validar datos
            $validate = \Validator::make($params_array, [
                'Nombre' => 'required',
                'RFC' => 'required',
                'Password' => 'required',
                'Email' => 'required|email|unique:usuarios',
                'Telefono' => 'required',
                'estado_id' => 'required'
            ]);


            //Comprobación de los datos
            if ($validate->fails())
            {
                //Validación fallida
                $data  = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'El usuario no se ha creado correctamente',
                    'errors' => $validate->errors()
                );
                //return redirect()->back()->withInput()->withErrors($validate->errors());

            } 
            else 
            {
                //Validación pasada correctamente
                //Cifrar contraseña

                //Comprobar usuario duplicado

                //Código de error HTTP

                //Crear al usuario
                $data  = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'El usuario se ha creado correctamente',
                );
            }

        } 
        else
        {
            $data  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'Los datos enviados no son correctos'
            );
        }

        
        

        return response()->json($data, $data['code']);
    }

}
