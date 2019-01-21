<?php

namespace learning\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //para subir imagenes
use learning\Http\Requests\ArrendatariosFormRequest;
use learning\Arrendatarios;
use DB;

class ArrendatariosController extends Controller
{
public function __construct()
    {
        
        
    }
    public function index(Request $request, $idcoopro)
    {
        if ($request)
        {

           $idcooprop=(int)$idcoopro;
          //echo $idinteg."-- ";
          //$query=trim($request->get('searchText'));
          $arrendatarios=DB::table('arrendatarios as a')
          ->join('coopropietarios as c', 'a.id_coopropietario','=','c.id')
          ->where('a.id_coopropietario','=', $idcooprop)         
          //->orwhere('i.nombre','LIKE','%'.$query.'%')
          //->orwhere('i.rut','LIKE','%'.$query.'%')
          ->select('a.id','a.nombre','a.rut','a.dig','c.nombre as nombrecoopropietario','a.imagen','a.id_coopropietario as id_coop','a.fecha_inic','a.fecha_term')
          //->orderBy ('a.id_coopropietario','desc')
          ->paginate(10);
  
          //dd(DB::getQueryLog());
          //print_r($integrantes);
          //dd($arrendatarios);
          /*
          foreach ($integrantes as $integra){

            echo $integra->id_coo;

          }
          */
          return view('almacen.arrendatario.index',["arrendatarios"=>$arrendatarios, "idcooprop"=>$idcooprop]);
          
      }       
        
    }

 public function create()
    {


//   	$coopropietarios=DB::table('coopropietarios')->get();

//    return view("almacen.integrante.create",["coopropietarios"=>$coopropietarios]);  
     
    }
     public function store(ArrendatariosFormRequest $request)
    {
        //$coopropietarios=new Coopropietarios;
        $arrendatarios=new \learning\Arrendatarios;
        $arrendatarios->nombre=$request->get('nombre');
        $arrendatarios->rut=$request->get('rut');
        $arrendatarios->dig=$request->get('dig');

        if (input::file('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/arrendatarios/',$file->getClientOriginalName());
        	$arrendatarios->imagen='/'.$file->getClientOriginalName();
        }

        $arrendatarios->id_coopropietario=$request->get('id_coopropietario');
        $arrendatarios->fecha_inic=$request->get('fecha_inic');
        $arrendatarios->fecha_term=$request->get('fecha_term');







        //$integrantes->imagen=$request->get('imagen');
        //la siguiente linea es para que un campo se le asigne un valor predertimando
        //$articulo->estado='Activo'
        //asignar un valor directo
        //categoria->condifion='1';

        // a continuacion para trabajar con la subida de la imagen


        //var_dump($integrantes->last());
        
        $arrendatarios->save();
        //$id = Integrante::insertGetId();
        //var_dump($integrantes->last());
        //$integrantes = Integrante::latest()->take(5)->get();
        //return Redirect::to('almacen/integrante');

        /*
        PAra grabar un solo campo
        ***************************
        $storie->where('Id',$request['tu_input_id'])
       ->update(['descripcion_history'=>$request['tu_input_descripcion']]);
		*/





        //return Redirect::back();
       return Redirect::to('grabaestado/'.$arrendatarios->id_coopropietario);

 // comentado hoy domingo 9       return Redirect::to('/editintegrantes/'.$integrantes->id_coopropietario);
        
    }   
    public function show($id)
    {
      return view("almacen.integrante.show",["integrantes"=> Integrante::findOrFail($id)]);       
        
        
    }
     public function edit($id)
    {

    $arrendatarios=Arrendatarios::findOrFail($id);

    $coopclave = $arrendatarios->id_coopropietario;

      
      $coonombre=DB::table('arrendatarios as a')
      ->join('coopropietarios as c', 'a.id_coopropietario','=','c.id')  
      ->where('c.id','=',$coopclave)
      ->select('c.nombre As coopname')->get();


    //$coopropietarios=DB::table('coopropietarios')->get();



	//return view("almacen.integrante.edit",["integrantes"=>$integrantes,"coopropietarios"=>$coopropietarios
  //  ,"coopronombre"=>$coonombre]); 

return view("almacen.arrendatario.edit",["arrendatarios"=>$arrendatarios,"coopronombre"=>$coonombre]); 





  //return view("almacen.coopropietario.edit",["Coopropietario"=> \learning\Coopropietario::findOrFail($id)]);       
    }
    public function update(ArrendatariosFormRequest $request,$id)
    {
        $arrendatario= \learning\Arrendatarios::findOrFail($id);

        $arrendatario->nombre=$request->get('nombre');
        $arrendatario->rut=$request->get('rut');
        $arrendatario->dig=$request->get('dig');

        if (input::file('imagen')){
          $file=Input::file('imagen');
          $file->move(public_path().'/imagenes/arrendatarios/',$file->getClientOriginalName());
          $arrendatario->imagen='/'.$file->getClientOriginalName();
        }

        $arrendatario->id_coopropietario=$request->get('id_coopropietario');
        $arrendatario->fecha_inic=$request->get('fecha_inic');
        $arrendatario->fecha_term=$request->get('fecha_term');
        //dd($integrante);
        
        $arrendatario->save();
        //$integrante->update();
        //return Redirect::to('almacen/integrante');
        return Redirect::to('/editarrendatarios/'.$arrendatario->id_coopropietario);
        
    }
     public function destroy($id)
    {
        //$coopropietarios= \learning\Coopropietario::
         $integrante= \learning\Integrante::findOrFail($id);
         $idinte=$integrante->id_coopropietario;
        //$categoria->condicion='0'; // para borrar un campo y solo se necesita cambiar un estado, lo siguiente
         //$integrante->update();
         $integrante->delete();
         //return Redirect::to('almacen/integrante');
         
         return Redirect::to('/editintegrantes/'.$idinte);

         //ejemplo

         //$path = 'usuario/post/mostrar/' . Input::get('id');
         //return Redirect::to($path)->with('mensaje', $respuesta['mensaje']);
    }










}
