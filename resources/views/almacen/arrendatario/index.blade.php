@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        
        <h3>Arrendatario de coopropietario:  

                 @foreach ($arrendatarios as $arren)
                    {{$arren->nombrecoopropietario}}
                 @endforeach


            </h3>
        
         
        
    </div>


    
    
    
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    
                  <th>id</th>
                  <th>Nombre</th>                  
                  <th>Rut</th>
                  <th>Fec.Inic.</th>
                  <th>Fec.Term.</th>
                  <th>imagen</th>
                  <th>Opciones Arrendatarios</th>
                </thead>
                @foreach ($arrendatarios as $arre)
                <tr>
                    <td>{{ $arre->id }}</td>
                    <td>{{ $arre->nombre }}</td>
                    <td>{{ $arre->rut }}-{{ $arre->dig }}</td>
                    <td>{{ $arre->fecha_inic }}</td>
                    <td>{{ $arre->fecha_term }}</td>
                    <td> 
                        <img src="{{asset('imagenes/arrendatarios/'). $arre->imagen}}" alt="{{ $arre->nombre }}" height="100px" width="100px">
                    </td>

                    <td>




                    
                        

                        <!--<a href="{{URL::action('ArrendatariosController@edit',$arre->id)}}"><button class="btn btn-info">Editar-</button></a>-->

                        <a href="{{url('/editararrendatarios/'.$arre->id)}}"><button class="btn btn-info">Edit</button></a>

                        <!--<a href="" data-target="#modal-delete-{{$arre->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar</button></a>-->

                        <a href="{{url('/listintegrantesarre/'.$arre->id.'/'.$idcooprop)}}"><button class="btn btn-info">Ver Integrantes</button></a>

                        <a href="{{url('/editintegrantesarre/'.$arre->id.'/'.$idcooprop)}}"><button class="btn btn-info">Crea Edit Integrantes</button></a>

 
                        



                    </td>
                </tr>
                @include('almacen.arrendatario.modal')
                @endforeach
            </table>
            
        </div>
        
        {{ $arrendatarios->render() }}
        
    </div>
    
</div>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        

     

        <h3><a href="{{url('/')}}"><button class="btn btn-success">Volver</button></a>   </h3>
       

        
    </div>
    
    
    
</div>
@endsection
<!--stop-->
