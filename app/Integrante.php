<?php

namespace learning;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
 public $table = 'integrantes';
 public $primaryKey = 'id';
 public $timestamps = false;
    
    public $fillable =[    
    'nombre',
    'rut',
    'dig',
    'id_coopropietario',
    'imagen'
    ];
    
    public $guarded =[
        
        
    ];
}
