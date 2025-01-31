<?php
	include ("conection/config.php");
    include ("menuA.php");
	include ("view_pro_indicate.php");
	$clase = new sistema;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Mercado Internacional e Indicadores</title> 
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap-theme.css" rel="stylesheet">
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" rel="stylesheet">
<!--<link href="css/estilos.css" rel="stylesheet"> -->
<!--<script src="js/jquery.js"></script> -->
<!--<script src="js/myjava.js"></script> -->
<script src="bootstrap/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script src="bootstrap/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
</head>
<body>
<section>
    <h4>Lista de Indicadores de Producto</h4>
    <br />
    <a href="reg_indicatorNewpro"><input type="button" value="REGISTRAR NUEVO INDICADOR DEL PRODUCTO" id="" class="btn btn-primary"/></a>
    <br />
    <br />
    <table class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
               
                <th>CODIGO</th>
                <th><center>TEMA</center></th>
                <th>NOMBRE INDICADOR</th>
                <th><center>FUENTE NOTA</center></th>
                <th><center>FUENTE ORGANIZACIONAL</center></th>
            </tr>
        </thead>
        <tbody>
            <?php $clase->conexion();
                     $clase->mostrarAsistencias(); ?>
        </tbody>
    </table>
</section>

<!-- MODAL DE REGISTRO -->

 <div class="modal fade" id="modalAsistencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registro de Asistencias</b></h4>
            </div>
            <div class="modal-body">
            <fieldset><legend>1. Generar Registro</legend>
				<table class="tbl-registro" width="100%">
                	<tr>
                    	<td>Codigo: </td>
                        <td><input type="text" class="form-control" id="codRegistro" maxlength="5"/></td>
                    	<td>Fecha: </td>
                        <td><input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled="disabled"/></td>
                    </tr>
                    <tr>
                    	<td colspan="4"><input type="button" id="generarAsistencia" class="btn btn-success" value="Ingresar Alumnos" /></td>
                    </tr>
                </table>
                </fieldset>
                <div id="mensaje"></div>
                <fieldset><legend>2. Registrar Alumnos</legend>
                <table class="tbl-registro" width="100%">
                	<tr>
                    	<td><input type="text" placeholder="Escriba el nombre y apellido del estudiante..." class="form-control" id="nombEstudiante" disabled="disabled"/></td>
                        <td><input type="button" id="regEstudiante" class="btn btn-primary" value="+" disabled="disabled"/></td>
                    </tr>
                </table>
                </fieldset>
                <br />
                <div id="contenidoRegistro"></div>
                <div class="modal-footer">
                	<input type="button" id="guardar" class="btn btn-default" value="Guardar"/>
                </div>
            </div>
          </div>
        </div>
      </div>
      
      
   <!-- MODAL PARA MOSTRAR EL DETALLE -->

 <div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registro de Asistencias</b></h4>
            </div>
            <div class="modal-body" id="datosAqui">
            </div>
          </div>
       </div>
   </div>   

</body>
</html>