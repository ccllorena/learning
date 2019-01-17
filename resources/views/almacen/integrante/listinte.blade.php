@extends ('layouts.admin')
@section ('contenido')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        
        <h3>Listado Integrantes</h3>
        
       
        
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
                  <th>Coopropietario</th>
                  <th>Imagen</th>
                </thead>
                @foreach ($integra as $inte)
                <tr>
                    <td>{{ $inte->id }}</td>
                    <td>{{ $inte->nombre }}</td>
                    <td>{{ $inte->rut }}-{{ $inte->dig }}</td>
                    <td>{{ $inte->nombrecoopropietario }}</td>
                    <td> 
                        <img src="{{asset('imagenes/integrantes/'). $inte->imagen}}" alt="{{ $inte->nombre }}" height="100px" width="100px">
                    </td>

                </tr>
                
                @endforeach
            </table>
            
        </div>
        
        {{ $integra ->render() }}
        
    </div>
                     
 
                 
</div>

@endsection
<!--stop-->
