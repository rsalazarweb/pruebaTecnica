<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Usuario;

use Illuminate\Validation\Rule;



class UsuariosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate(3);

        return view('usuarios.index', array(
            'usuarios' => $usuarios
       ));

        //Datos retornados por Json
        /* return response()->json([

            $data  = array(
                'status' => 'success',
                'code' => 200,
                'message' => 'El usuario se ha creado correctamente',
                'usuarios' => $usuarios
            )
        ]); */
 
        //Metodo get a la vista

        //$usuarios::paginate(3);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //Retornando vista
        return view('usuarios.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Almacenando dato
        $datosUsuario = request()->all();  

        $datosUsuario=request()->except('_token');
        
        Usuario::insert($datosUsuario);

        //return response()->json($datosUsuario);
        return redirect('/api/usuarios/')->with('Mensaje', 'Usuario agregado con Éxito');

        


        // //Recoger datos de usuario por POST
        // $json = $request->input('json', null);
        // //var_dump($json);
        // $params = json_decode($json); //Saco el objeto
        // $params_array = json_decode($json,true); //array de los datos

        // if(!empty($params) && !empty($params_array))
        // {
        //     //Limpiar datos
        //     $params_array = array_map('trim', $params_array);

        //     //Validar datos
        //     $validate = \Validator::make($params_array, [
        //         'Nombre' => 'required',
        //         'Edad' => 'required',
        //         'RFC' => 'required',
        //         'Password' => 'required',
        //         'Email' => 'required|email|unique:usuarios', //Comprobar usuario duplicado
        //         'Telefono' => 'required',
        //         'estado_id' => 'required'
        //     ]);


        //     //Comprobación de los datos
        //     if ($validate->fails())
        //     {
        //         //Validación fallida
        //         $data  = array(
        //             'status' => 'error',
        //             'code' => 404,
        //             'message' => 'El usuario no se ha creado correctamente',
        //             'errors' => $validate->errors()
        //         );
        //         //return redirect()->back()->withInput()->withErrors($validate->errors());

        //     } 
        //     else 
        //     {
        //         //Validación pasada correctamente

        //         //Cifrar contraseña
        //         $pass = password_hash($params->Password, PASSWORD_BCRYPT, ['cost'=>4]);
                

        //         //Código de error HTTP

        //         //Crear al usuario

        //         $usuario = new Usuario();
        //         $usuario->Nombre = $params_array['Nombre'];
        //         $usuario->Edad = $params_array['Edad'];
        //         $usuario->RFC = $params_array['RFC'];
        //         $usuario->Password = $pass;
        //         $usuario->Email = $params_array['Email'];
        //         $usuario->Telefono = $params_array['Telefono'];
        //         $usuario->estado_id = $params_array['estado_id'];

        //         //Guardar el Usuario en BD
        //         $usuario->save();


        //         $data  = array(
        //             'status' => 'success',
        //             'code' => 200,
        //             'message' => 'El usuario se ha creado correctamente',
        //             'usuario' => $usuario
        //         );  
        //     }

        // } 
        // else
        // {
        //     $data  = array(
        //         'status' => 'error',
        //         'code' => 404,
        //         'message' => 'Los datos enviados no son correctos'
        //     );
        // }

        
        

        // return response()->json($data, $data['code']);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);


        if(is_object($usuario)){
            $data  = [
                'status' => 'success',
                'code' => 200,
                'usuario' => $usuario
            ];

        } else {
            $data  = [
                'status' => 'error',
                'code' => 404,
                'message' => 'El usuario no existe'
            ];
        }

        return response()->json($data, $data['code']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Mètodo para devolver todos los datos del usuario
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
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
        
        /*
        //Recoger datos por post
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);
             
        //var_dump($id);
        //var_dump($params_array);
        //die();
        $usuario = Usuario::find($id);
        var_dump($usuario->id);
        
        if(!empty($params_array))
        {

            //Validar datos
            $validate = \Validator::make($params_array, [
                    'Nombre' => 'required',
                    'Edad' => 'required',
                    'RFC' => 'required',
                    'Password' => 'required',
                    'Email' => 
                    'required|email|unique:usuarios,'.$usuario->id, //librar el email duplicado
                    'Telefono' => 'required',
                    'estado_id' => 'required'
            ]);

            //Campos sin actualizar
            unset($params_array['id']);
            unset($params_array['created_at']);
            
            //Actualizar usuario en bd
            $usuario_update = Usuario::where('id', $id)->update($params_array);

            $data = [
                'code' => 200,
                'status' => 'success',
                'usuario' => $params_array
            ];
        } else{
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'No se ha enviado ningún usuario'
            ];
        } */

        $datosUsuario=request()->except(['_token', '_method']);
        Usuario::where('id', '=', $id)->update($datosUsuario);

        // $usuario = Usuario::findOrFail($id);
        // return view('usuarios.edit', compact('usuario'));

        return redirect('api/usuarios')->with('Mensaje', 'Usuario actualizado con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        /*Primer método
        //Conseguir el registro
        $usuario = Usuario::find($id);
        //Borrar registro
        $usuario->delete();
        //Devolver algo
        /*$data = [
            'code' => 200,
            'status' => 'success',
            'post' =>  $usuario
        ];
        //return response()->json($data, $data['code']); */

        //Segundo Método
        //Regreso a la vista
        Usuario::destroy($id);
        return redirect('/api/usuarios/')->with('Mensaje', 'Usuario eliminado con Éxito');;
    }
}
