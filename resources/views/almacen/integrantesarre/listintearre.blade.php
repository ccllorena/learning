@extends ('layouts.admin')
@section ('contenido')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        
        <h3>Listado Integrantes Arrendatario <a href="{{url('/editarrendatarios/'.$idcoopropie)}}"><button class="btn btn-success">Volver</button>

        </a> </h3>
        
       
        
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
                  <th>Arrendatairo</th>
                  <th>Imagen</th>
                </thead>
                @foreach ($integranarre as $intearre)
                <tr>
                    <td>{{ $intearre->id }}</td>
                    <td>{{ $intearre->nombre }}</td>
                    <td>{{ $intearre->rut }}-{{ $intearre->dig }}</td>
                    <td>{{ $intearre->nombrearrendatario }}</td>
                    <td> 
                        <img src="{{asset('imagenes/integrantesarre/'). $intearre->imagen}}" alt="{{ $intearre->nombre }}" height="100px" width="100px">
                    </td>

                </tr>
                
                @endforeach
            </table>
            
        </div>
        
        {{ $integranarre ->render() }}
        
    </div>
                     
 
                 
</div>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

        <h3><a href="{{url('/editarrendatarios/'.$idcoopropie)}}"><button class="btn btn-success">Volver</button>

        </a>   </h3>
       

        
    </div>
    
    
    
</div>
@endsection
<!--stop-->
