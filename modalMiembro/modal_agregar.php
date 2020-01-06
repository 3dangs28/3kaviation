<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      

    <div class="modal-header">
                    <h5 class="modal-title">Formulario para agregar miembros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


      <div class="modal-body">
      <div id="datos_ajax_register"></div>
      

     
      <div class="form-group">
         <label for="lalo"  class="control-label">Cédula</label>
            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula" required autocomplete="off" >
         </div>
      
   
      <div class="form-group">
           <label for="lalo"  class="control-label">Primer Nombre</label>
            <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Nombre:" required autocomplete="off" >
         </div>
      
     
         <div class="form-group">
         <label for="lalo"  class="control-label">Segundo Nombre</label>
            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Segundo nombre:" required autocomplete="off" >
         </div>

         <div class="form-group">
         <label for="lalo"  class="control-label">Primer Apellido</label>
            <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Apellido:" required autocomplete="off" >
         </div>

   
         <div class="form-group">
         <label for="lalo"  class="control-label">Segundo Apellido</label>
            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo apellido:" required autocomplete="off" >
         </div>


         <div class="form-group">
         <label for="lalo"  class="control-label">Género</label>
				   <select class="form-control" id="gen" name="gen" required>
				                       
				                                <option value="1">MASCULINO</option>
				                                <option value="2">FEMENINO</option>
				  </select>
              </div>
              <div class="form-group">
              <label for="lalo"  class="control-label">Teléfono</label>
            <input type="text" class="form-control" id="tel" name="tel" placeholder="Teléfono:" required autocomplete="off" >
         </div>
              <div class="form-group">
              <label for="lalo"  class="control-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo:" required autocomplete="off" >
         </div>


         <div class="form-group">
         <label for="lalo"  class="control-label">Dirección</label>
            <textarea class="form-control" id="dir" name="dir"  rows="3" placeholder="Dirección:"  autocomplete="off"></textarea>
         </div>




      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>

       
      </div>
    </div>
  </div>
</div>
</form>