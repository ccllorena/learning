@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

      
        <h3>Arrendatario: {{$arrenombre[0]->intearrename}} </h3>

        <h2>Editar integrante Arrendatario{{$integrantesarre->nombre}} </h2>

        @if (count($errors)>0)
        <div class="alert alert-danger">
            
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li> 
                @endforeach
            </ul>
            
            
            
        </div>
        
       @endif
     </div>
     </div>

     {!!Form::open(array('route'=>array('updatearrendatariosinte.update', $integrantesarre->id),'method'=>'PATCH', 'autocomplete'=>'off','files'=>'true'))!!}

       {{Form::token()}}

    <div class="row">  

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
       <div class="form-group">
           <label for="nombre">Nombre</label>
           <input type="text" name="nombre" class="form-control" value="{{$integrantesarre->nombre}}">           
       </div>
    </div>  

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class="form-group">
           <label for="rut">Rut</label><br>
           <input type="text" name="rut" class=""  size="6" value="{{$integrantesarre->rut}}"> -
           <input type="text" name="dig" class=""  size="2" value="{{$integrantesarre->dig}}">
       </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class="form-group">
          <label>Arrendatario</label>
            <select name="id_arrendatarios" class="form-control">
            @foreach ($arrendatarios as $arren)
              @if($arren->id==$integrantesarre->id_arrendatarios)
                <option value="{{$arren->id}}" selected>{{$arren->nombre}}-{{$arren->id}}-{{$integrantesarre->id_arrendatarios}}</option>
              @else
                <option value="{{$arren->id}}">{{$arren->nombre}}-{{$arren->id}}-{{$integrantesarre->id_arrendatarios}}</option>
              @endif
            @endforeach
            </select>  
          </div>
        </div>
              <!--if($coop->nombre == $coopronombre[0]->coopname){-->

 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    
       <div class="form-group">
           <label for="imagen">Imagen</label>
           <input type="file" name="imagen" class="form-control" value="{{$integrantesarre->imagen}}"> 
           @if (($integrantesarre->imagen)!="")
            <img src="{{asset('imagenes/integrantesarre/'.$integrantesarre->imagen)}}" height="300px" width="300px">
           @endif          
       </div>

  </div>

       <div class="form-group">
           
           <button class="btn btn-primary" type="submit">Guardar</button>
           <button class="btn btn-danger" type="reset">Cancelar</button>
           
       </div>
       
       {!!Form::close()!!}
        

@endsection


