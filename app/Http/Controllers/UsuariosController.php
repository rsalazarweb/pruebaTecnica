<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usuario;

class UsuariosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
                'Edad' => 'required',
                'RFC' => 'required',
                'Password' => 'required',
                'Email' => 'required|email|unique:usuarios', //Comprobar usuario duplicado
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
                $pass = password_hash($params->Password, PASSWORD_BCRYPT, ['cost'=>4]);
                

                //Código de error HTTP

                //Crear al usuario

                $usuario = new Usuario();
                $usuario->Nombre = $params_array['Nombre'];
                $usuario->Edad = $params_array['Edad'];
                $usuario->RFC = $params_array['RFC'];
                $usuario->Password = $pass;
                $usuario->Email = $params_array['Email'];
                $usuario->Telefono = $params_array['Telefono'];
                $usuario->estado_id = $params_array['estado_id'];

                //Guardar el Usuario en BD
                $usuario->save();


                $data  = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'El usuario se ha creado correctamente',
                    'usuario' => $usuario
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
