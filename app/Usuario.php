<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //tabla
    protected $table = "usuarios";

    //DATOS DE LA TABLA
    protected $fillable = [
        'Nombre','Edad', 'RFC', 'Password', 'Email', 'Telefono', 'estado_id'
    ];

    public function estado()
    {
        return $this->hasOne('App\Estado');
    }
    
}
