<?php 
//require_once ("conection/config.php");
//require_once ("menu.php");
require_once('conection/config.php');
//$link=  Conectarse();
$listado=  mysql_query("SELECT
producto.id,
sector.sector,
producto.producto,
producto.eliminado
FROM
producto
INNER JOIN sector ON producto.idsector = sector.id
WHERE
producto.eliminado = '0'
ORDER BY
sector.sector ,
producto.producto ASC",$link);
mysql_query ("SET NAMES 'utf8'");

/*$listado=  mysql_query("SELECT
producto.id,
sector.sector,
producto.producto,
producto.eliminado
FROM
producto
INNER JOIN sector ON producto.idsector = sector.id
WHERE
producto.eliminado = '0'
ORDER BY
sector.sector ,
producto.producto ASC");*/
?>

 <script type="text/javascript" language="javascript" src="js/jslistadoproducto.js"></script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_producto">
                <thead>
                    <tr>
                        <th>id</th><!--Estado-->
                        <th>Sector</th>
                        <th>Producto</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                       
                     
                    </tr>
                </tfoot>
                  <tbody>
                    <?php

     
                   while($reg=  mysql_fetch_array($listado))
                   {
                               echo '<tr>';
                               echo '<td >'.mb_convert_encoding($reg['id'], "UTF-8").'</td>';
                               echo '<td>'.mb_convert_encoding($reg['sector'], "UTF-8").'</td>';
							    echo '<td>'.mb_convert_encoding($reg['producto'], "UTF-8").'</td>';
                               echo '</tr>';
                     
                        }
                    ?>
                <tbody>
            </table>
