<?php

namespace learning\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\input; //para subir imagenes
use learning\Http\Requests\IntegrantesArreFormRequest;
use learning\IntegrantesArrendatarios;
use DB;

class IntegrantesArreController extends Controller
{
	public function __construct()
    {
        
        
    }

public function index(Request $request, $idarre, $idcoopro)
    {
        if ($request)
        {
          //DB::enableQueryLog();

          //unset($integrantes);
          //$integrantes = array();
          $idcoop=(int)$idcoopro; 
          $idarren=(int)$idarre;
          //echo $idinteg."-- ";
          $query=trim($request->get('searchText'));
          $integrantesarre=DB::table('integrantesarrendatarios as ia')
          ->join('arrendatarios as a', 'ia.id_arrendatarios','=','a.id')
          ->where('ia.id_arrendatarios','=', $idarren)         
          //->orwhere('i.nombre','LIKE','%'.$query.'%')
          //->orwhere('i.rut','LIKE','%'.$query.'%')
          ->select('ia.id','ia.nombre','ia.rut','ia.dig','a.nombre as nombrearrendatario','ia.imagen','ia.id_arrendatarios as id_arre')
          ->orderBy ('ia.id','desc')
          ->paginate(3);
  
          //dd(DB::getQueryLog());
          //print_r($integrantes);
          //dd($integrantes);
          /*
          foreach ($integrantes as $integra){

            echo $integra->id_coo;

          }
          */
          return view('almacen.integrantesarre.index',["integrantesarre"=>$integrantesarre,"searchText"=>$query,"idarren"=>$idarren,"idcoop"=>$idcoop]);

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
    public function create($idaarren)
    {
      // para devolver un grupo de registros
      //$categorias=DB::table('categoria')->where ('condicion','=', '1')->get();
    	$arrendatarios=DB::table('arrendatarios')->where ('id','=', $idaarren)->get();
      //dd($coopropietarios);
      return view("almacen.integrantesarre.create",["arrendatarios"=>$arrendatarios]);  
        
    }
     public function store(IntegrantesArreFormRequest $request)
    {
        //$coopropietarios=new Coopropietarios;

       


        $integrantesarre=new IntegrantesArrendatarios;
        $integrantesarre->nombre=$request->get('nombre');
        $integrantesarre->rut=$request->get('rut');
        $integrantesarre->dig=$request->get('dig');
        $integrantesarre->id_arrendatarios=$request->get('id_arrendatarios');
        //$integrantes->imagen=$request->get('imagen');
        //la siguiente linea es para que un campo se le asigne un valor predertimando
        //$articulo->estado='Activo'
        //asignar un valor directo
        //categoria->condifion='1';

        // a continuacion para trabajar con la subida de la imagen
        
        if (input::file('imagen')){

        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/integrantesarre/',$file->getClientOriginalName());
        	$integrantesarre->imagen='/'.$file->getClientOriginalName();
        }

        //var_dump($integrantes->last());

        $coopropie=DB::table('arrendatarios')->where ('id','=', $integrantesarre->id_arrendatarios)->get();
        $coopropi=$coopropie[0]->id_coopropietario;

        $integrantesarre->save();
        //$id = Integrante::insertGetId();
        //var_dump($integrantes->last());
        //$integrantes = Integrante::latest()->take(5)->get();
        //return Redirect::to('almacen/integrante');
        return Redirect::to('/editintegrantesarre/'.$integrantesarre->id_arrendatarios.'/'.$coopropi);
     
    }   
    public function show($id)
    {
      return view("almacen.integrante.show",["integrantes"=> Integrante::findOrFail($id)]);       
        
        
    }
     public function edit($id)
    {

    $integrantesarre=IntegrantesArrendatarios::findOrFail($id);

    $intearreclave = $integrantesarre->id_arrendatarios;

      
      $arrenombre=DB::table('integrantesarrendatarios as ia')
      ->join('arrendatarios as a', 'ia.id_arrendatarios','=','a.id')  
      ->where('a.id','=',$intearreclave)
      ->select('a.nombre As intearrename')->get();


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
    $arrendatarios=DB::table('arrendatarios')->get();
    //$cooclave=DB::table('coopropietarios')->where('id_coopropietario',)->get();

    //$coopropietarios->first();
    //dd(DB::getQueryLog());
    //return view("almacen.integrante.edit",["integrantes"=> \learning\Coopropietario::findOrFail($id)]
	return view("almacen.integrantesarre.edit",["integrantesarre"=>$integrantesarre,"arrendatarios"=>$arrendatarios
    ,"arrenombre"=>$arrenombre]); 
  //return view("almacen.coopropietario.edit",["Coopropietario"=> \learning\Coopropietario::findOrFail($id)]);       
    }
    public function update(IntegrantesArreFormRequest $request,$id)
    {
        $integrantearre= \learning\IntegrantesArrendatarios::findOrFail($id);
        //$coopropietarios=new Coopropietarios;
        //$integrante=new \learning\Integrante; *** LO saque porque me insert y no update
        //$integrante->id=$id; **** NO resulto lo agregue para arreglar porque me insert y no update
        $integrantearre->nombre=$request->get('nombre');
        $integrantearre->rut=$request->get('rut');
        $integrantearre->dig=$request->get('dig');
        $integrantearre->id_arrendatarios=$request->get('id_arrendatarios');
        //$integrante->imagen=$request->get('imagen');
        //la siguiente linea es para que un campo se le asigne un valor predertimando
        //$articulo->estado='Activo'
        //asignar un valor directo
        //categoria->condifion='1';
        // a continuacion para trabajar con la subida de la imagen
        
        if (input::file('imagen')){

        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/integrantesarre/',$file->getClientOriginalName());
        	$integrantearre->imagen='/'.$file->getClientOriginalName();
        }

        //dd($integrante);

        $coopropie=DB::table('arrendatarios')->where ('id','=', $integrantearre->id_arrendatarios)->get();
        $coopropi=$coopropie[0]->id_coopropietario;

        
        $integrantearre->save();
        //$integrante->update();
        //return Redirect::to('almacen/integrante');
        return Redirect::to('/editintegrantesarre/'.$integrantearre->id_arrendatarios.'/'.$coopropi);
        
    }
     public function destroy($id)
    {
        //$coopropietarios= \learning\Coopropietario::
         $integrantearre= \learning\IntegrantesArrendatarios::findOrFail($id);
         $idintearre=$integrantearre->id_arrendatarios;
        //$categoria->condicion='0'; // para borrar un campo y solo se necesita cambiar un estado, lo siguiente
        $coopropie=DB::table('arrendatarios')->where ('id','=', $integrantearre->id_arrendatarios)->get();
        $coopropi=$coopropie[0]->id_coopropietario;
         
         //$integrante->update();
         $integrantearre->delete();
         //return Redirect::to('almacen/integrante');
         
         return Redirect::to('/editintegrantesarre/'.$idintearre.'/'.$coopropi);

         //ejemplo

         //$path = 'usuario/post/mostrar/' . Input::get('id');
         //return Redirect::to($path)->with('mensaje', $respuesta['mensaje']);
    }

public function listintegrantesarre($id, $idcooprop)
    {
            // crear mensaje
    //notificar por mail
    //Devolver respuesdta al usuario 
    
    
    //return 'Pagina prueba:'.$id;
          $idcoopropie=(int)$idcooprop;
          $idarrenda=(int)$id; 
          //$query=trim($request->get('searchText'));
          $integranarre=DB::table('integrantesarrendatarios as ia')
          ->join('arrendatarios as a', 'ia.id_arrendatarios','=','a.id')         
          ->where('ia.id_arrendatarios','=', $id)
          ->select('ia.id','ia.nombre','ia.rut','ia.dig','a.nombre as nombrearrendatario','ia.imagen')
          ->orderBy ('ia.id','desc')
          ->paginate(3);

          //dd(DB::getQueryLog());

          //dd($integrantes);

          return view('almacen.integrantesarre.listintearre',["integranarre"=>$integranarre,"idarrenda"=>$idarrenda,"idcoopropie"=>$idcoopropie]);


    }


}
