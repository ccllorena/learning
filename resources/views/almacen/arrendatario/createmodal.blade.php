<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-crea">
  
  <!-- este form de creacion se usa cuando no echo nada antes ni edit ni index osea nada anterior, graba directo en controller.store-->

      {!!Form::open(array('route'=>array('storearrendatarios.store'),'method'=>'POST', 'autocomplete'=>'off','files'=>'true'))!!}
       {{Form::token()}}
 


    <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                   <span aria-hidden="true">x</span>
               </button>
               <h4 class="modal-title">Crear Arrendatarios</h4>

          </div>
      <div class="modal-body">

        <div class="row"> 

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
           <label for="nombre">Nombre</label>
           <input type="text" name="nombre" required class="form-control" placeholder="Nombre....">           
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

        <input type="hidden" name="id_coopropietario" value="{{$Coopropietario->id}}">


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
           <label for="fecha_inic">Fecha Inicio</label>
           <input type="date" name="fecha_inic" data-date-format="DD MM YYYY" required class="form-control" placeholder="Fecha inicio">           
         </div>  
       </div>

      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
           <label for="fecha_term">Fecha Termino</label>
           <input type="date" name="fecha_term" data-date-format="DD MM YYYY" required class="form-control" placeholder="Fecha Termino">           
         </div>  
       </div>











      </div>


    </div>
           <div class="modal-footer">
               <button id="cerrar" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
               <button type="submit" class="btn btn-primary">Confirmar</button>
          </div>           
   </div>
  </div>


       
       {!!Form::close()!!}


</div>



   