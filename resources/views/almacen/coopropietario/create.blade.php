@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo Coopropietario</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error  }}</li> 
                @endforeach
            </ul>
            
            
            
        </div>
        
       @endif
       
       {!!Form::open(array('url'=>'almacen/coopropietario','method'=>'POST', 'autocomplete'=>'off'))!!}
       {{Form::token()}}
       
       <div class="form-group">
           <label for="nombre">Nombre</label>
           <input type="text" name="nombre" class="form-control" placeholder="Nombre....">           
       </div>
       
       <div class="form-group">
           <label for="depto">Depto</label>
           <input type="text" name="depto" class="form-control" placeholder="Departamento....">           
       </div>
       
       <div class="form-group">
           <label for="rut">Rut</label><br>
           <input type="text" name="rut" class="" placeholder="Rut...." size="6"> -
           <input type="text" name="dig" class="" placeholder="Dig" size="2">
       </div>
       <div class="form-group">
           
           <button class="btn btn-primary" type="submit">Guardar</button>
           <button class="btn btn-danger" type="reset">Reset</button>
           
       </div>
       
       {!!Form::close()!!}
        
    </div>
    
    
</div>


<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

        <h3><a href="{{url('/')}}"><button class="btn btn-success">Volver</button></a>   </h3>
      
    </div>
   
</div>
@endsection
<!--stop-->

