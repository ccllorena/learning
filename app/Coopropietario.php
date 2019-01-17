<?php

namespace learning;

use Illuminate\Database\Eloquent\Model;

class Coopropietario extends Model
{
    public $table = 'coopropietarios';
    public $primaryKey = 'id';
    public $timestamps = false;
    
    public $fillable =[
        
    'nombre',
    'depto',
    'rut',
    'dig',
    'estado'
    ];
    
    public $guarded =[
        
        
    ];
}
