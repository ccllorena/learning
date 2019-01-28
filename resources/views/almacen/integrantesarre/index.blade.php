@extends ('layouts.admin')
@section ('contenido')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        
        <!--<h3>Integrantes <a href="/createintegrantes/"><button class="btn btn-success">Nuevo</button></a>   </h3>-->
        <h3>Integrantes Arrendatarios:<a href="{{url('/createintegrantesarre/'.$idarren)}}"><button class="btn btn-success">Nuevo</button></a>   </h3>
       
        
        
    </div>
    
    
    
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    
                  <th>id.</th>
                  <th>Nombre</th>
                  <th>Rut</th>
                  <th>Arrendatario</th>
                  <th>Imagen</th>
                </thead>
                @foreach ($integrantesarre as $intearre)
                <tr>
                    <td>{{ $intearre->id }}</td>
                    <td>{{ $intearre->nombre }}</td>
                    <td>{{ $intearre->rut }}-{{ $intearre->dig }}</td>
                    <td>{{ $intearre->nombrearrendatario }}</td>
                    <td> 
                        <img src="{{asset('imagenes/integrantesarre/'). $intearre->imagen}}" alt="{{ $intearre->nombre }}" height="100px" width="100px">
                    </td>



                    <td>


                        <a href="{{URL::action('IntegrantesArreController@edit',$intearre->id)}}"><button class="btn btn-info">Editarr</button></a>


                        <a href="" data-target="#modal-delete-{{$intearre->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar</button></a>
                        


                    </td>
                </tr>
                @include('almacen.integrantesarre.modal')
                @endforeach
            </table>
            
        </div>
        
        {{ $integrantesarre ->render() }}
        
    </div>
                     
 
                 
</div>

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        

     

        <h3><a href="{{url('/editarrendatarios/'.$idcoop)}}"><button class="btn btn-success
            ">Volver</button>

        </a>   </h3>
       

        
    </div>
    
    
    
</div>



@endsection
<!--stop-->
