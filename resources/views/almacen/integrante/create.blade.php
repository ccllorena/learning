@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo Integrante</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error  }}</li> 
                @endforeach
            </ul>            
        </div>
       @endif
    </div>
  </div>


       {!!Form::open(array('url'=>'almacen/integrante','method'=>'POST', 'autocomplete'=>'off','files'=>'true'))!!}
       {{Form::token()}}
 
  <div class="row">  

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
           <label for="nombre">Nombre</label>
           <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre....">           
        </div>  
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      
        <div class="form-group">
           <label>Coopropietario</label>
            <select name="id_coopropietario" class="form-control">
              @foreach ($coopropietarios as $coop)
                <option value="{{$coop->id}}" selected>{{$coop->nombre}}</option>
              @endforeach
            </select>            
       </div>
    
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class="form-group">
           <label for="rut">Rut</label><br>
           <input type="text" name="rut" class="" placeholder="Rut...." size="6"> -
           <input type="text" name="dig" class="" placeholder="Dig" size="2">
       </div>
    </div>

  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    
       <div class="form-group">
           <label for="imagen">Imagen</label>
           <input type="file" name="imagen" class="form-control">           
       </div>

  </div>

  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    
       <div class="form-group">
           <button class="btn btn-primary" type="submit">Guardar</button>
           <button class="btn btn-danger" type="reset">Cancelar</button>          
       </div>

    </div>


       
       {!!Form::close()!!}
        
@endsection
<!--stop-->

