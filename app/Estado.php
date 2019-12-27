<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
     //tabla
     protected $table = "estados";

     //DATOS DE LA TABLA
     protected $fillable = ['Estado'];

     
    public function usuarios()
    {
        return $this->hasMany('App\Usuario');
    }
}
