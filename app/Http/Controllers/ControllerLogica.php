<?php

namespace learning\Http\Controllers;

use Illuminate\Http\Request;
//use learning\Http\Request;
//use learning\Antupiren;
use Illuminate\Support\Facades\Redirect;
use learning\Http\Requests\CoopropietariosFormRequest;
use learning\Coopropietario;
use DB;



class ControllerLogica extends Controller
{
    //
    public function contacto()
    {
            // crear mensaje
    //notificar por mail
    //Devolver respuesdta al usuario 
    
    
    return 'Pagina contacto';
    }
    
    
    
    //public function index()
    //{
    //return view('welcome');
    //}
    
    public function usuario()
    {
     //$datos = Antupiren::all();
     //dd($datos);
     //return $datos;
     //return view('index', compact('datos'));   
    }
    
    public function __construct()
    {
        
        
    }
    public function perfil()
    {
    
    // identificar que el usuario exista
    //traer datos del usuario
    // enviar los datos
    //cargar la vista correspondiente
    
    
    return 'Pagina perfilllllllkkkk';
    }
    public function index(Request $request)
    {
        //return 'Pagina INDEX';
        if ($request)
        {
          $query=trim($request->get('searchText'));
          $coopropietarios=DB::table('coopropietarios as c')
          ->join('estados as e', 'c.estado','=','e.id')
          ->where('c.nombre','LIKE','%'.$query.'%')
          ->where ('depto','<>','')
          ->select('c.id','c.nombre','c.rut','c.dig','e.nombre as estadocoopropietario','c.depto','c.estado','e.id as idestado')
          ->orderBy ('c.id','desc')
          ->paginate(3);

          $estados=DB::table('estados as ee')
          ->select('ee.id as idestados','ee.nombre as nombreestado')->get();
          //var_dump($estados);
          return view('almacen.coopropietario.index',["coopropietarios"=>$coopropietarios,"searchText"=>$query,"estados"=>$estados]);
            
        }
        
    }
    public function create()
    {
      return view("almacen.coopropietario.create");  
        
    }
     public function store(CoopropietariosFormRequest $request)
    {
        //$coopropietarios=new Coopropietarios;
        $coopropietarios=new \learning\Coopropietario;
        $coopropietarios->nombre=$request->get('nombre');
        $coopropietarios->depto=$request->get('depto');
        $coopropietarios->rut=$request->get('rut');
        $coopropietarios->dig=$request->get('dig');
        //asignar un valor directo
        $coopropietarios->estado=1;


        $coopropietarios->save();
        return Redirect::to('/');
        
        
    }   
    public function show($id)
    {
      return view("almacen.coopropietario.show",["Coopropietario"=> Coopropietario::findOrFail($id)]);       
        
        
    }
     public function edit($id)
    {

          $estados=DB::table('estados as ee')
          ->select('ee.id as idestados','ee.nombre as nombreestado')->get();

    return view("almacen.coopropietario.edit",["Coopropietario"=> \learning\Coopropietario::findOrFail($id),"estados"=>$estados ]); 
        
    }
    public function update(CoopropietariosFormRequest $request,$id)
    {


        $coopropietarios= \learning\Coopropietario::findOrFail($id);

  /*      

        $estad=0;
        if ($coopropietarios->estado <> $request->get('estado')){
          if ($request->get('estado')==2){
            $estad=1;
            dd($estad);
          }
        }

*/

        
        $coopropietarios->nombre=$request->get('nombre');
        $coopropietarios->depto=$request->get('depto');
        $coopropietarios->rut=$request->get('rut');
        $coopropietarios->dig=$request->get('dig');
        $coopropietarios->estado=$request->get('estado');

        $coopropietarios->save();

        //if ($estad==1){


        //}else{

          return Redirect::to('/');
        //}
        
    }
     public function destroy($id)
    {
        //$coopropietarios= \learning\Coopropietario::
         $coopropietarios= \learning\Coopropietario::findOrFail($id);
        //$categoria->condicion='0';
         $coopropietarios->delete();
         return Redirect::to('/');
    } 

    
    public function listintegrantes($id)
    {
            // crear mensaje
    //notificar por mail
    //Devolver respuesdta al usuario 
    
    
    //return 'Pagina prueba:'.$id;

          //$query=trim($request->get('searchText'));
          $integra=DB::table('integrantes as i')
          ->join('coopropietarios as c', 'i.id_coopropietario','=','c.id')         
          ->where('i.id_coopropietario','=', $id)
          ->select('i.id','i.nombre','i.rut','i.dig','c.nombre as nombrecoopropietario','i.imagen')
          ->orderBy ('i.id','desc')
          ->paginate(2);

          //dd(DB::getQueryLog());

          //dd($integrantes);

          return view('almacen.integrante.listinte',["integra"=>$integra]);


    }

    public function grabaestado($id)
    {
      $coopropie= \learning\Coopropietario::findOrFail($id);

      $coopropie->estado=2;

      $coopropie->save();

      //return Redirect::back();
      return Redirect::back();

    }

}
