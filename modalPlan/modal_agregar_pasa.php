<form id="guardarDatosPasa" >
<div class="modal fade" id="dataRegisterPasa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      

    <div class="modal-header">
                    <h5 class="modal-title">Formulario para agregar pasajeros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


      <div class="modal-body">
      <div id="datos_ajax_pasa"></div>

<div class="form-row">

<div class="form-group col-md-6">
<input type="hidden" class="form-control" id="id" name="id" placeholder="plan">
<label for="inputPassword4">Nombre</label>
<input type="propietario" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
</div>

<div class="form-group col-md-6">
  <label for="inputPassword4">Apellido</label>
  <input type="propietario" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
</div>
 
</div>


<div class="form-row">

<div class="form-group col-md-6">
  <label for="inputEmail4">Nacionalidad</label>
  <select id="nacionalidad" name="nacionalidad" class="form-control">
    <option selected>Seleccione país</option>
    <option>Panamá</option>
    <option>Costa Rica</option>
    <option>Colombia</option>
  </select>
</div>

<div class="form-group col-md-6">
<label for="inputCity">Fecha de nacimiento</label>
<div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" id="fechaNac" name="fechaNac" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
              </div>
</div>

</div>



<div class="form-row">

<div class="form-group col-md-6">

<label for="inputPassword4">Tipo de documento</label>
<input type="propietario" class="form-control" id="tdocu" name="tdocu" placeholder="Tipo de documento">
</div>

<div class="form-group col-md-6">
  <label for="inputPassword4">Documento</label>
  <input type="propietario" class="form-control" id="documento" name="documento" placeholder="Documento">
</div>
 
</div>


<div class="form-row">

<div class="form-group col-md-6">
<label for="inputCity">Fecha de exp. Documento</label>
<div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" id="fechaDocu" name="fechaDocu" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
              </div>
</div>

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

<!-- Bootstrap WYSIHTML5 -->
