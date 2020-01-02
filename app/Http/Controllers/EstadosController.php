<?php

namespace App\Http\Controllers;
use App\Estado;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    public function listarEstados()
    {
        //Mètodo para devolver todos los datos del usuario
        $estados = Estado::all();

        return view('usuarios.index', compact('estados'));
    }
}
