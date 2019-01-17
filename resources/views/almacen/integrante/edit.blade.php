@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

      
        <h3>Coopropietario: {{$coopronombre[0]->coopname}} </h3>

        <h2>Editar integrante {{$integrantes->nombre}} </h2>

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

       {!!Form::model($integrantes,['method'=> 'PATCH','route'=>['integrante.update',$integrantes->id],'files'=>'true'])!!}
       {{Form::token()}}

    <div class="row">  

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
       <div class="form-group">
           <label for="nombre">Nombre</label>
           <input type="text" name="nombre" class="form-control" value="{{$integrantes->nombre}}">           
       </div>
    </div>  

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class="form-group">
           <label for="rut">Rut</label><br>
           <input type="text" name="rut" class=""  size="6" value="{{$integrantes->rut}}"> -
           <input type="text" name="dig" class=""  size="2" value="{{$integrantes->dig}}">
       </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class="form-group">
          <label>Coopropietario</label>
            <select name="id_coopropietario" class="form-control">
            @foreach ($coopropietarios as $coop)
              @if($coop->id==$integrantes->id_coopropietario)
                <option value="{{$coop->id}}" selected>{{$coop->nombre}}-{{$coop->id}}-{{$integrantes->id_coopropietario}}</option>
              @else
                <option value="{{$coop->id}}">{{$coop->nombre}}-{{$coop->id}}-{{$integrantes->id_coopropietario}}</option>
              @endif
            @endforeach
            </select>  
          </div>
        </div>
              <!--if($coop->nombre == $coopronombre[0]->coopname){-->

 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    
       <div class="form-group">
           <label for="imagen">Imagen</label>
           <input type="file" name="imagen" class="form-control" value="{{$integrantes->imagen}}"> 
           @if (($integrantes->imagen)!="")
            <img src="{{asset('imagenes/integrantes/'.$integrantes->imagen)}}" height="300px" width="300px">
           @endif          
       </div>

  </div>

       <div class="form-group">
           
           <button class="btn btn-primary" type="submit">Guardar</button>
           <button class="btn btn-danger" type="reset">Cancelar</button>
           
       </div>
       
       {!!Form::close()!!}
        

@endsection


