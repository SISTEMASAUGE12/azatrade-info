<?php
ini_set("memory_limit", "150M");
set_time_limit(750);
?>
                          <div class="table-responsive" id="divconsuno">
                           <div class='material-datatables'>
                            <table id='datatableseuno' class="table table-striped table-bordered table-sm">
                             <thead>
                             	<tr>
                             		<th>#</th>
                             		<th>PARTIDA</th>
                             		<th>DESCRIPCIÓN</th>
                             		<th>FOB USD</th>
                             		<th>PESO NETO</th>
                             		<th>PRECIO</th>
                             		<th>ACCION</th>
                             	</tr>
                             	<thead>
                             	<tbody>
                             	<?php
	$id = $_GET["codigo"];
	$dat2 = $_GET["mes"];
	$dat3 = $_GET["pais"];
	$dat4 = $_GET["adua"];
	$dat5 = $_GET["ruc"];
	$dat6 = $_GET["desc"];
	include("../../incBD/inibd.php");
	$sqlespact="SELECT i.part_nandi, '' as descripcion, Sum(i.fob_dolpol) AS fob, Sum(i.peso_neto) AS pneto, Sum(i.fob_dolpol)/Sum(peso_neto) AS precio
FROM importacion AS i
/*LEFT JOIN arancel AS a ON i.part_nandi = a.idarancel*/
WHERE
YEAR(i.fech_ingsi) = '$id' AND
MONTH(i.fech_ingsi) like '%$dat2%' AND
i.libr_tribu LIKE '%$dat5%' AND
i.pais_orige LIKE '%$dat3%' AND
i.codi_aduan LIKE '%$dat4%' AND
CONCAT(i.desc_comer, i.desc_matco, i.desc_usoap, i.desc_fopre, i.desc_otros, i.part_nandi) LIKE '%$dat6%'
GROUP BY i.part_nandi
ORDER BY fob DESC";
	$resultado_creg=$conexpg->query($sqlespact); 
if($resultado_creg->num_rows>0){ 
while($fila_creg=$resultado_creg->fetch_array()){
	  $iteespact = $iteespact + 1;
	  $id_esac = $fila_creg["part_nandi"];
	  $esac1 = $fila_creg["descripcion"];
	  $esac2 = number_format($fila_creg["fob"],2);
	  $esac3 = number_format($fila_creg["pneto"],2);
	  $esac4 = number_format($fila_creg["precio"],2);

	//consultanos agente
	$sqlage = "select descripcion from arancel where idarancel = '$id_esac' limit 1";
	$rsage=$conexpg->query($sqlage); 
if($rsage->num_rows>0){ 
while($rwage=$rsage->fetch_array()){ 
	$esac1 = $rwage['descripcion'];
}
}else{
	$esac1 = "---";
}
	  echo"<tr>";
	  echo"<td>$iteespact</td>";
	  echo"<td>$id_esac</td>";
	  echo"<td>$esac1</td>";
	  echo"<td>$esac2</td>";
	  echo"<td>$esac3</td>";
	  echo"<td>$esac4</td>";
	  echo"<td>";
		  
		  ?>
	  <a href="busqueda-detallada_dos.php?selecanios=<?=$id;?>&selecmes=<?=$dat2;?>&pais=<?=$dat3;?>&aduana=<?=$dat4;?>&ruce=<?=$dat5;?>&descri1=<?=$dat6;?>&partida=<?=$id_esac;?>&nomparti=<?=$esac1;?>"><button class="btn btn-info btn-sm"><i class="material-icons">reorder</i>Listar</button></a>
	  <?php
	echo"</td>";
	  echo"</tr>";
  }
}else{
	echo"<tr>";
	  echo"<td colspan='7' align='center'><b>No Hay Datos</b></td>";
	  echo"</tr>";
}
mysqli_close($conexpg);
?>
                             	</tbody>
                             </table>
</div>
   </div>
    
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
   
   <script type="text/javascript">
$(document).ready(function() {
    $('#datatableseuno').DataTable({
		"order": [[ 0, "asc" ]],
		dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
			'csv', 'excel'
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Buscar resultados",
			"info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
			"infoEmpty":      "Mostrando 0 a 0 de 0 registros",
			"infoFiltered":   "(Filtro de _MAX_ total registros)",
			"loadingRecords": "Cargando...",
			"processing":     "Procesando...",
			"zeroRecords":    "No se encontraron coincidencias",
			"paginate": {
				"first":      "Primero",
				"last":       "Ultimo",
				"next":       "Próximo",
				"previous":   "Anterior"
    },
        }

    });
    var table = $('#datatableseuno').DataTable();

    $('.card .material-datatablese label').addClass('form-group');
});

</script>