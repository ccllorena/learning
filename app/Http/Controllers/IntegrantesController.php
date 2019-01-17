<?php

namespace learning\Http\Controllers;

use Illuminate\Http\Request;
//use learning\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\input; //para subir imagenes
use learning\Http\Requests\IntegrantesFormRequest;
use learning\Integrante;
use DB;



class IntegrantesController extends Controller
{
public function __construct()
    {
        
        
    }
    public function index(Request $request, $idinte)
    {
        if ($request)
        {
          //DB::enableQueryLog();

          //unset($integrantes);
          //$integrantes = array();
            
          $idinteg=(int)$idinte;
          //echo $idinteg."-- ";
          $query=trim($request->get('searchText'));
          $integrantes=DB::table('integrantes as i')
          ->join('coopropietarios as c', 'i.id_coopropietario','=','c.id')
          ->where('i.id_coopropietario','=', $idinteg)         
          //->orwhere('i.nombre','LIKE','%'.$query.'%')
          //->orwhere('i.rut','LIKE','%'.$query.'%')
          ->select('i.id','i.nombre','i.rut','i.dig','c.nombre as nombrecoopropietario','i.imagen','i.id_coopropietario as id_coo')
          ->orderBy ('i.id','desc')
          ->paginate(100);
  
          //dd(DB::getQueryLog());
          //print_r($integrantes);
          //dd($integrantes);
          /*
          foreach ($integrantes as $integra){

            echo $integra->id_coo;

          }
          */
          return view('almacen.integrante.index',["integrantes"=>$integrantes,"searchText"=>$query,"idinteg"=>$idinteg]);

          //$queries = DB::getQueryLog();
          //$last_query = end($queries);
          //dd($last_query);
          
          //DB::enableQueryLog();

          /*$query=trim($request->get('searchText'));
          $integrantes = DB::select('SELECT coopropietarios.id, coopropietarios.nombre AS nombrecoopropietario, integrantes.id,integrantes.nombre, integrantes.rut, integrantes.dig, integrantes.id_coopropietario, integrantes.imagen FROM antupiren.integrantes INNER JOIN antupiren.coopropietarios ON (integrantes.id_coopropietario = coopropietarios.id) where integrantes.id = 18');






          return view('almacen.integrante.index',["integrantes"=>$integrantes,"searchText"=>$query]);
          */
          
      }       
        
    }
    public function create($idccoop)
    {
      // para devolver un grupo de registros
      //$categorias=DB::table('categoria')->where ('condicion','=', '1')->get();
    	$coopropietarios=DB::table('coopropietarios')->where ('id','=', $idccoop)->get();
      //dd($coopropietarios);
      return view("almacen.integrante.create",["coopropietarios"=>$coopropietarios]);  
        
    }
     public function store(IntegrantesFormRequest $request)
    {
        //$coopropietarios=new Coopropietarios;
        $integrantes=new \learning\Integrante;
        $integrantes->nombre=$request->get('nombre');
        $integrantes->rut=$request->get('rut');
        $integrantes->dig=$request->get('dig');
        $integrantes->id_coopropietario=$request->get('id_coopropietario');
        //$integrantes->imagen=$request->get('imagen');
        //la siguiente linea es para que un campo se le asigne un valor predertimando
        //$articulo->estado='Activo'
        //asignar un valor directo
        //categoria->condifion='1';

        // a continuacion para trabajar con la subida de la imagen
        
        if (input::file('imagen')){

        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/integrantes/',$file->getClientOriginalName());
        	$integrantes->imagen='/'.$file->getClientOriginalName();
        }

        //var_dump($integrantes->last());
        
        $integrantes->save();
        //$id = Integrante::insertGetId();
        //var_dump($integrantes->last());
        //$integrantes = Integrante::latest()->take(5)->get();
        //return Redirect::to('almacen/integrante');
        return Redirect::to('/editintegrantes/'.$integrantes->id_coopropietario);
        
    }   
    public function show($id)
    {
      return view("almacen.integrante.show",["integrantes"=> Integrante::findOrFail($id)]);       
        
        
    }
     public function edit($id)
    {

    $integrantes=Integrante::findOrFail($id);

    $cooclave = $integrantes->id_coopropietario;

      
      $coonombre=DB::table('integrantes as i')
      ->join('coopropietarios as c', 'i.id_coopropietario','=','c.id')  
      ->where('c.id','=',$cooclave)
      ->select('c.nombre As coopname')->get();


        /*
          $integran=DB::table('integrantes as i')
          ->join('coopropietarios as c', 'i.id_coopropietario','=','c.id')         
          ->where('i.nombre','LIKE','%'.$query.'%')
          ->orwhere('i.rut','LIKE','%'.$query.'%')
          ->select('i.id','i.nombre','i.rut','i.dig','c.nombre as nombrecoopropietario','i.imagen')
        */



    //para llamar otra tabla pero que cumpla una condicion
    //$categorias=DB::table('categoria')->where('condicion','=','1')->get();

    //DB::enableQueryLog();
    //$coopropietarios=DB::table('coopropietarios')->where('id','=','1')->get();
    $coopropietarios=DB::table('coopropietarios')->get();
    //$cooclave=DB::table('coopropietarios')->where('id_coopropietario',)->get();

    //$coopropietarios->first();
    //dd(DB::getQueryLog());
    //return view("almacen.integrante.edit",["integrantes"=> \learning\Coopropietario::findOrFail($id)]
	return view("almacen.integrante.edit",["integrantes"=>$integrantes,"coopropietarios"=>$coopropietarios
    ,"coopronombre"=>$coonombre]); 
  //return view("almacen.coopropietario.edit",["Coopropietario"=> \learning\Coopropietario::findOrFail($id)]);       
    }
    public function update(IntegrantesFormRequest $request,$id)
    {
        $integrante= \learning\Integrante::findOrFail($id);
        //$coopropietarios=new Coopropietarios;
        //$integrante=new \learning\Integrante; *** LO saque porque me insert y no update
        //$integrante->id=$id; **** NO resulto lo agregue para arreglar porque me insert y no update
        $integrante->nombre=$request->get('nombre');
        $integrante->rut=$request->get('rut');
        $integrante->dig=$request->get('dig');
        $integrante->id_coopropietario=$request->get('id_coopropietario');
        //$integrante->imagen=$request->get('imagen');
        //la siguiente linea es para que un campo se le asigne un valor predertimando
        //$articulo->estado='Activo'
        //asignar un valor directo
        //categoria->condifion='1';
        // a continuacion para trabajar con la subida de la imagen
        
        if (input::file('imagen')){

        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/integrantes/',$file->getClientOriginalName());
        	$integrante->imagen='/'.$file->getClientOriginalName();
        }

        //dd($integrante);
        
        $integrante->save();
        //$integrante->update();
        //return Redirect::to('almacen/integrante');
        return Redirect::to('/editintegrantes/'.$integrante->id_coopropietario);
        
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
