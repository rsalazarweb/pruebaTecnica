<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadosController extends Controller
{
    public function storage()
    {
        //Mètodo para devolver todos los datos del usuario
        $estado = Estado::all();

        return view('usuarios.edit', compact('estado'));
    }
}
