<?php

namespace learning;

use Illuminate\Database\Eloquent\Model;

class Antupiren extends Model
{
    //
    
    public $table = "usuarios";
    
    public $timestamps = false;
    
    //protected $hidden = [
    //  'password'  ];
    
    public function UsuarioDato()
    {
        //relacionar con la tabla usuarios_datos
        
        return $this->hasOne('learning\UsuarioDato', 'id_usuarios', 'id')->withDefault(['direccion'=>null]);
    }
}
