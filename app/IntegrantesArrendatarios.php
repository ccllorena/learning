<?php

namespace learning;

use Illuminate\Database\Eloquent\Model;

class IntegrantesArrendatarios extends Model
{
 public $table = 'integrantesarrendatarios';
 public $primaryKey = 'id';
 public $timestamps = false;
    
    public $fillable =[    
    'nombre',
    'rut',
    'dig',
    'id_arrendatarios',
    'imagen'
    ];
    
    public $guarded =[
        
        
    ];
}
