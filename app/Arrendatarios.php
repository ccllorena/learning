<?php

namespace learning;

use Illuminate\Database\Eloquent\Model;

class Arrendatarios extends Model
{
 public $table = 'arrendatarios';
 public $primaryKey = 'id';
 public $timestamps = true;
    
    public $fillable =[    
    'nombre',
    'rut',
    'dig',
    'imagen',
    'id_coopropietario',
    'fecha_inic',
    'fecha_term',
    'created_at',
    'updated_at'
    ];
    
    public $guarded =[
        
        
    ];
}
