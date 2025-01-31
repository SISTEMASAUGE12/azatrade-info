<!-- Modal -->
<?php
$url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
?>
  <div class="modal fade" id="myModal_formulario" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center><img class="img-responsive" src="../img/Azatrade11.png"></center></h4>
        </div>
        <div class="modal-body">
          <!-- formulario -->
          <form name="formcompra" id="formcompra" class="form-horizontal" method="post" action="email.php">
<fieldset>

<!-- Form Name -->
<legend>Formulario de Solicitud de Compra: <?php echo "$nom_pag" ?></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombres Completos</label>  
  <div class="col-md-5">
  <input name="nombres" type="text" placeholder="Nombres / Apellidos" class="form-control input-md" >
  <input id="textinput" name="id_pagina" type="hidden"  class="form-control input-md" value="<?php echo "$cod" ?>">
  <input id="textinput" name="no_pagina" type="hidden"  class="form-control input-md" value="<?php echo "$nom_pag" ?>">
  <input id="textinput" name="no_inst" type="hidden"  class="form-control input-md" value="<?php echo "$nom_ins" ?>">
  <input id="textinput" name="descri_p" type="hidden"  class="form-control input-md" value="<?php echo "$des_pag" ?>">
  <input id="textinput" name="precio_pp" type="hidden"  class="form-control input-md" value="<?php echo "$monto" ?>">
  <input id="textinput" name="detalle" type="hidden"  class="form-control input-md" value="<?php echo "$url_actual" ?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-5">
  <input name="correo" type="email" placeholder="Correo Electronico" class="form-control input-md" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Celular</label>  
  <div class="col-md-5">
  <input name="celular" type="text" placeholder="Numero Celular" class="form-control input-md">
  <!--<span class="help-block">* Opcional</span>-->  
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Comentario</label>
  <div class="col-md-6">                     
    <textarea class="form-control" name="comentario" rows="8" placeholder="Ingresa tu comentario"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-success" type="submit">Enviar Compra</button>
  </div>
</div>

</fieldset>
</form>
<!-- fin formulario -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  