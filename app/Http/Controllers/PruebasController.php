<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class PruebasController extends Controller
{

    // public function index()
    // {
    //     $animales = ['Perro', 'Gato', 'Tigre'];

    //     return view('pruebas.index', array(
    //         'animales' => $animales
    //     ));
    // }

    public function testOrm()
    {
        $usuarios = Usuario::all();
        foreach($usuarios as $usuario)
        {
            echo "<p>" . $usuario->Nombre. "</p>";
            echo "<p>" . $usuario->Edad. "</p>";
            echo "<p>" . $usuario->RFC. "</p>";
            echo "<p>" . $usuario->Password. "</p>";
            echo "<p>" . $usuario->Email. "</p>";
            echo "<p>" . $usuario->Telefono. "</p>";
            echo "<p>{$usuario->estado->Estado}</p>";
        }
        die();

    }
}
