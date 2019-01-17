@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

      
        <h3>Coopropietario: {{$coopronombre[0]->coopname}} </h3>

        <h2>Editar arrendatario {{$arrendatarios->nombre}} </h2>

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




      {!!Form::open(array('route'=>array('updatearrendatarios.update', $arrendatarios->id),'method'=>'PATCH', 'autocomplete'=>'off','files'=>'true'))!!}
       {{Form::token()}}




        <div class="row"> 

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
           <label for="nombre">Nombre</label>
           <input type="text" name="nombre" required class="form-control" value="{{$arrendatarios->nombre}}">           
         </div>  
       </div>


    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class="form-group">
           <label for="rut">Rut</label><br>
           <input type="text" name="rut" class="" value="{{$arrendatarios->rut}}" size="6"> -
           <input type="text" name="dig" class="" value="{{$arrendatarios->dig}}" size="2">
       </div>
    </div>

      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class="form-group">
           <label for="imagen">Imagen</label>
           <input type="file" name="imagen" class="form-control" value="{{$arrendatarios->imagen}}">           
       </div>
    </div>

        <input type="hidden" name="id_coopropietario" value="{{$arrendatarios->id_coopropietario}}">


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
           <label for="fecha_inic">Fecha Inicio</label>
           <input type="date" name="fecha_inic" data-date-format="DD MM YYYY" required class="form-control" value="{{$arrendatarios->fecha_inic}}">           
         </div>  
       </div>

      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
           <label for="fecha_term">Fecha Termino</label>
           <input type="date" name="fecha_term" data-date-format="DD MM YYYY" required class="form-control" value="{{$arrendatarios->fecha_term}}">           
         </div>  
       </div>

      </div>

       <div class="form-group">
           
           <button class="btn btn-primary" type="submit">Guardar</button>
           <button class="btn btn-danger" type="reset">Cancelar</button>
           
       </div>
       
       {!!Form::close()!!}
        

@endsection


