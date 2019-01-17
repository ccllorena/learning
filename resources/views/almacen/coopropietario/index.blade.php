@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        
        <h3>Listado Coopropietarios <a href="create"><button class="btn btn-success">Nuevo</button></a>   </h3>
        
        @include('almacen.coopropietario.search') 
        
    </div>
    
    
    
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    
                  <th>id</th>
                  <th>Nombre</th>
                  <th>Depto.</th>
                  <th>Rut</th>
                  <th>Estado</th>
                  <th>Opciones Coopropietario</th>
                </thead>
                @foreach ($coopropietarios as $coo)
                <tr>
                    <td>{{ $coo->id }}</td>
                    <td>{{ $coo->nombre }}</td>
                    <td>{{ $coo->depto }}</td>
                    <td>{{ $coo->rut }}-{{ $coo->dig }}</td>

                    <td>
                    <select name="estado" class="form-control" disabled="">
                    @foreach ($estados as $esta)   
                     @if($esta->idestados==$coo->idestado)
                        <option value="{{$esta->idestados}}" selected>{{$esta->nombreestado}}</option>
                    @else
                        <option value="{{$esta->idestados}}">{{$esta->nombreestado}}</option>
                     @endif

                    @endforeach
                    </select>
                    @if($coo->idestado==2)
                       <a href="{{url('/editarrendatarios/'.$coo->id)}}"><button class="btn btn-info">Edit Arrendatarios</button></a>
                    @endif
                    </td>
                    <!--<td>{{ $coo->idestado }}</td>-->      
                    <td>




                    
                        

                        <a href="{{URL::action('ControllerLogica@edit',$coo->id)}}"><button class="btn btn-info">Editar</button></a>

                        <a href="" data-target="#modal-delete-{{$coo->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar</button></a>

                        <a href="{{url('/listintegrantes/'.$coo->id)}}"><button class="btn btn-info">Ver Integrantes</button></a>

                        <a href="{{url('/editintegrantes/'.$coo->id)}}"><button class="btn btn-info">Crea Edit Integrantes</button></a>

                        <!--<a href="{{URL::action('IntegrantesController@index',$coo->id)}}"><button class="btn btn-info">Edit Integrantes</button></a>-->
                        



                    </td>
                </tr>
                @include('almacen.coopropietario.modal')
                @endforeach
            </table>
            
        </div>
        
        {{ $coopropietarios->render() }}
        
    </div>
    
</div>

@endsection
<!--stop-->
