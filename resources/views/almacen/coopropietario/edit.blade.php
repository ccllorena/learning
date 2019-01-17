@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Coopropietario: {{$Coopropietario->nombre}}</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li> 
                @endforeach
            </ul>
            
            
            
        </div>
        
       @endif
       
       {!!Form::model($Coopropietario,['method'=> 'PATCH','route'=>['coopropietario.update',$Coopropietario->id]] )!!}
       {{Form::token()}}
       
       <div class="form-group">
           <label for="nombre">Nombre</label>
           <input type="text" name="nombre" class="form-control" value="{{$Coopropietario->nombre}}" placeholder="Nombre....">           
       </div>
       
       <div class="form-group">
           <label for="depto">Depto</label>
           <input type="text" name="depto" class="form-control" value="{{$Coopropietario->depto}}" placeholder="Departamento....">           
       </div>
       <div class="form-group">
           <label for="rut">Rut</label><br>
           <input type="text" name="rut" class="" placeholder="Rut...." size="6" value="{{$Coopropietario->rut}}"> -
           <input type="text" name="dig" class="" placeholder="Dig" size="2" value="{{$Coopropietario->dig}}">
       </div>

       <!--*******-->
              <div class="form-group">
                <label for="etiqueta">Estado</label>
                    <select name="estado" class="form-control">
                    @foreach ($estados as $esta)   
                     @if($esta->idestados==$Coopropietario->estado)
                        <option value="{{$esta->idestados}}" selected>{{$esta->nombreestado}}</option>
                    @else
                        <option value="{{$esta->idestados}}">{{$esta->nombreestado}}</option>
                     @endif

                    @endforeach
                    </select>

                   <input type="text" name="valorestado" size="40" value="Aquí saldrá el valor del select cuando cambie">
                   <input type="text" name="valorestadocoo" size="40" value="{{$Coopropietario->estado}}" disabled>  




              </div>     
      <!--*******-->



       <div class="form-group">
           
           <button class="btn btn-primary" type="submit">Guardar</button>
           <button class="btn btn-danger" type="reset">Cancelar</button>
           
       </div>
       
       {!!Form::close()!!}
        
    </div>
    
    
</div>
 @include('almacen.arrendatario.createmodal')

<script>
$(document).ready(function(){
  $("select[name=estado]").change(function(){
            //alert($('select[name=estado]').val());
            $('input[name=valorestado]').val($(this).val());

           var valorestado =  $('input[name=valorestado]').val();
           var valorestadocoo =  $('input[name=valorestadocoo]').val();
           //alert(valorestadocoo+"--"+valorestado);

           if (valorestadocoo != valorestado) {
            if (valorestado == 2) {

              var statusConfirm = confirm("Si desea cambiar estado a ARRENDADA debe ingresar inmediatamente al arrendatario");
              if (statusConfirm == true)
              {
                $('#modal-crea').modal();
              }else{
                  //alert("entre");
                  //$("#estado option[value=valorestadocoo]").attr('selected', 'selected');
                   // $("select[name=estado] option[value=$('input[name=valorestadocoo]').val()]").attr('selected', 'selected');
                  $("select[name=estado]").val(valorestadocoo);
                  $('input[name=valorestado]').val("Aquí saldrá el valor del select cuando cambie");
              }

            }
           }


        });

        $(".close").click(function() {
          //var valorestado =  $('input[name=valorestado]').val();
          var valorestadocoo =  $('input[name=valorestadocoo]').val();
          $("select[name=estado]").val(valorestadocoo);
          $('input[name=valorestado]').val("Aquí saldrá el valor del select cuando cambie");
        });

        $("#cerrar").click(function() {
          //var valorestado =  $('input[name=valorestado]').val();
          var valorestadocoo =  $('input[name=valorestadocoo]').val();
          $("select[name=estado]").val(valorestadocoo);
          $('input[name=valorestado]').val("Aquí saldrá el valor del select cuando cambie");
        });





});
</script>



@endsection


