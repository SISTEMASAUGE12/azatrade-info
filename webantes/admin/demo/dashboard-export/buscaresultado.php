<?php
include("../conector/config.php");
ini_set('memory_limit','550M');
set_time_limit(4300);

$dato1 = trim($_POST["selecanios"]);
$dato2 = trim($_POST["selecmes"]);
$dato3 = trim($_POST["depa"]);
$dato4 = trim($_POST["pais"]);
$dato5 = trim($_POST["aduana"]);
$dato6 = trim($_POST["ruce"]);
$dato7 = trim($_POST["descri1"]);
$dato8 = $_POST["marcacheck"];
$dato9 = trim($_POST["numpar"]);

/*if($dato2=='1'){$des_mes="Mes: Enero";}
if($dato2=='2'){$des_mes="Mes: Febrero";}
if($dato2=='3'){$des_mes="Mes: Marzo";}
if($dato2=='4'){$des_mes="Mes: Abril";}
if($dato2=='5'){$des_mes="Mes: Mayo";}
if($dato2=='6'){$des_mes="Mes: Junio";}
if($dato2=='7'){$des_mes="Mes: Julio";}
if($dato2=='8'){$des_mes="Mes: Agosto";}
if($dato2=='9'){$des_mes="Mes: Septiembre";}
if($dato2=='10'){$des_mes="Mes: Octubre";}
if($dato2=='11'){$des_mes="Mes: Noviembre";}
if($dato2=='12'){$des_mes="Mes: Diciembre";}*/

if($dato3==""){ $datoubigeo = ""; }else{ $datoubigeo = "and substring(e.UBIGEO,1,2) = '$dato3'"; }

if($dato4==""){ $datopais = ""; }else{ $datopais = "and e.CPAIDES = '$dato4'"; }

if($dato5==""){ $datoaduana = ""; }else{ $datoaduana = "and e.CADU like '$dato5' "; } 

if($dato6==""){ $datoruc = ""; }else{ $datoruc = "and e.NDOC = '$dato6' "; }

if($dato7==""){
	$datobusca = "";
}else{
	$datobusca = "and CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$dato7%'";
}

if($dato8=="1"){ $datoparti ="e.PART_NANDI = '$dato9' and"; }else{ $datoparti =""; }
	
	/*$sqlist="SELECT iddepartamento, nombre FROM departamento WHERE iddepartamento='$dato1' ";
$resultadov = $conexpg -> prepare($sqlist); 
$resultadov -> execute(); 
$djfros = $resultadov -> fetchAll(PDO::FETCH_OBJ); 
if($resultadov -> rowCount() > 0)   { 
foreach($djfros as $filavc) {
	$nivt1 = $filavc -> iddepartamento;
	$nivt2 = ucwords(strtolower($filavc -> nombre));
	$busdepa = $nivt2;
}
}else{
	$busdepa = "No hay datos";
}*/
	

/*if($dato2=="" or $dato3==""){
	echo "<div class='box-body pad res-tb-block'>
		  <div class='alert alert-danger'><i class='ti-announcement' style='font-size:26px;'></i> &nbsp;&nbsp;&nbsp; Uno o más campos requeridos estan vacios, verifique por favor. </div>              
		  </div>";
}else{*/
	
?>

<div class="box">
				<div class="box-header with-border">
			  <hr>
				  <h3 class="box-title">Filtros de Busqueda:</h3>
				  <h6 class="box-subtitle"><b> &#124; Resultado &#124; </b> año: <?=$dato1;?> <br> mes: <?=$dato2;?> <br> departamento: <?=$datoubigeo;?> <br> pais: <?=$datopais;?> <br> aduana: <?=$datoaduana;?> <br> ruc: <?=$datoruc;?> <br> check: <?=$dato8;?> <br> partida: <?=$datoparti;?> <br> busqueda: <?=$datobusca;?> </h6>
				</div>
				<!-- /.box-header -->
<div class="box-body">
<div class="table-responsive">
					  <!--<table id="example" class="table table-hover display nowrap margin-top-10 w-p100">-->
					  <table id="example" class="table table-hover display margin-top-10 w-p100">
						<thead>
							<tr>
								<th>#</th>
   <th>A&ntilde;o</th>
   <th>Fecha</th>
   <th>Aduana</th>
   <th>Dua</th>
   <th>N#. Doc.</th>
   <th>Empresa</th>
   <th>Direcci&oacute;n</th>
   <th>Departamento</th>
   <th>Provincia</th>
   <th>Distrito</th>
   <th>N#. Partida</th>
   <th>Descrip.&nbsp;Prod.</th>
   <th>Pais</th>
   <th>Puerto</th>
   <th>Via Transp.</th>
   <th>Unid. Transp.</th>
   <th>Descrip. Transp.</th>
   <th>Agente</th>
   <th>Recinto Aduanero</th>
   <th>Banco</th>
   <th>Valor Fob.</th>
   <th>Peso Neto</th>
   <th>Peso Bruto</th>
   <th>Cant. Exportada</th>
   <th>Unid. Medida</th>
   <th>Cant. Comercial(Kg)</th>
   <th>Unid. Comerc.</th>
   <th>Precio Unit.(x Kg)</th>
   <th>Precio Unit. (x Unid.Med.)</th>
   <th>Precio Unit. (x Unid.Comerc.)</th>
   <th>Peso (Envase/Embalaje)</th>
   <th>Sector</th>
							</tr>
						</thead>
						<tbody>
						<?php

$sqlparti="SELECT
YEAR(e.FNUM) as anio,
MONTH(e.FNUM) as mes,
e.FNUM,
e.NDCL,
e.CADU,
e.FEMB,
e.NDOC,
e.DNOMBRE,
e.DDIRPRO,
e.UBIGEO,
e.PART_NANDI,
e.NSER,
e.CPAIDES,
e.CPUEDES,
e.CVIATRA,
e.DMAT,
e.NCON,
e.CAGE,
'aa' as agente,
e.CALM,
e.VFOBSERDOL,
e.VPESNET,
e.VPESBRU,
e.QUNIFIS,
e.TUNIFIS,
e.QUNICOM,
e.TUNICOM,
CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) AS dcom,
substring(e.ubigeo,1,2),
substring(e.ubigeo,3,2),
substring(e.ubigeo,5,2),
a.descripcion AS aduana,
em.descripcion AS estmercancia,
p.espanol AS paisdestino,
pu.puerto,
vt.descripcion AS viatransporte,
ba.banco,
'ss' AS sector,
uu.descripcion AS undmedida,
ubi.nombredistrito,
ubi.nombreprov,
ubi.nombredepartamento,
recint_aduaner.razon_social as recinto_aduanero,
(case e.cunitra 
		when '1' then 'BARCO' 
		when '4' then 'AVION' 
		when '6' then 'FERROCARRIL' 
		when '7' then 'CAMION' 
		when '8' then 'POR TUBERIAS' 
	else 'OTRAS' end) as unidadtransporte,
(case e.vpesnet when 0 then 0 else (e.vfobserdol/e.vpesnet) end) as pesounitkg,
	(case e.qunifis when 0 then 0 else (e.vfobserdol/e.qunifis) end) as preciounitxundmedida,
	(case e.qunicom when 0 then 0 else (e.vfobserdol/e.qunicom) end) as preciounitxunidcomercial,
	(case e.vpesnet when 0 then 0 else (e.vpesbru/e.vpesnet) end) as pesoenvaseyembalaje
FROM
exportacion AS e
LEFT JOIN aduana AS a ON e.CADU = a.codadu
LEFT JOIN estmercancia AS em ON e.CEST = em.idestmercancia
LEFT JOIN paises AS p ON e.CPAIDES = p.idpaises
LEFT JOIN puerto AS pu ON e.CPUEDES = pu.idcodigo
LEFT JOIN viastransporte AS vt ON e.CVIATRA = vt.idviastransporte
LEFT JOIN banco AS ba ON substring(e.centfin,2,2)= ba.idbanco
LEFT JOIN unidmedida AS uu ON e.TUNIFIS = uu.idunidmedida
LEFT JOIN ubigeo AS ubi ON e.UBIGEO = ubi.cubigeo
LEFT JOIN (select idrecintaduaner, razon_social from recintaduaner group by idrecintaduaner, razon_social)as recint_aduaner On (recint_aduaner.idrecintaduaner=e.calm)
WHERE 
$datoparti 
YEAR(e.FNUM) = '$dato1' and 
MONTH(e.FNUM) = '$dato2'  
$datoubigeo 
$datopais
$datoaduana
$datoruc
$datobusca limit 100";

$repav = $conexpg -> prepare($sqlparti); 
$repav -> execute(); 
$dpos = $repav -> fetchAll(PDO::FETCH_OBJ); 
if($repav -> rowCount() > 0)   { 
foreach($dpos as $fila_parti) {
	$itte = $itte + 1;
		   $annio = $fila_parti -> anio;
	  $fecha = $fila_parti -> FNUM;
	   $adua = $fila_parti -> aduana;
	   $numdua = $fila_parti -> NDCL;
	    $numdoc = $fila_parti -> NDOC;
		 $nomempresa = $fila_parti -> DNOMBRE;
		 $direempresa = $fila_parti -> DDIRPRO;
		 //$ubigeoempresa = $fila_parti -> ubigeo2;
			 $ubigeoempresa = $fila_parti -> nombredepartamento;
			  $ubigeoprovi = $fila_parti -> nombreprov;
			  $ubigeodistri = $fila_parti -> nombredistrito;
		 $num_partida = $fila_parti -> PART_NANDI;
		 $descri_produ = $fila_parti -> dcom;
		 $pais_des = $fila_parti -> paisdestino;
		 $puerto_descri = $fila_parti -> puerto;
		 $via_transp = $fila_parti -> viatransporte;
		 $uni_transp = $fila_parti -> unidadtransporte;
		 
		 $descri_mat = $fila_parti -> DMAT;
	$cod_agente = $fila_parti -> CAGE;
		 //$nom_agente = $fila_parti -> agente;
		 $nom_aduanero = $fila_parti -> recinto_aduanero;
		 $nom_banco = $fila_parti -> banco;
		 $valor_fob = number_format($fila_parti -> VFOBSERDOL,2); 
		 $valor_net = number_format($fila_parti -> VPESNET,2);
		 $valor_bru = number_format($fila_parti -> VPESBRU,2);
		 $valor_A = number_format($fila_parti -> QUNIFIS,2);
		 $nom_unidad = $fila_parti -> undmedida;
		 $valor_B = number_format($fila_parti -> QUNICOM,2);
		 $unid_comer = $fila_parti -> TUNIFIS;
		 $peso_unit = number_format($fila_parti -> pesounitkg,2);
		 $precio_unitmed = number_format($fila_parti -> preciounitxundmedida,2);
		 $precio_unitcomerc = number_format($fila_parti -> preciounitxunidcomercial,2);
		 $peso_envemb = number_format($fila_parti -> pesoenvaseyembalaje,2);
		 //$nom_sector = $fila_parti -> sector;
			 
			 //consultanos sector
	$sqlsecto = "SELECT partida FROM sector where='$num_partida' ";	
$rsce = $conexpg -> prepare($sqlsecto); 
$rsce -> execute(); 
$dsss = $rsce -> fetchAll(PDO::FETCH_OBJ); 
if($rsce -> rowCount() > 0)   { 
foreach($dsss as $rws) {
	$nom_sector = $rws -> sector;
}
}else{
	$nom_sector = "---";
}
	//consultanos agente
	$sqlage = "select aa.agencia from agente aa where aa.idagente = '$cod_agente' limit 1";
	
$rsage = $conexpg -> prepare($sqlage); 
$rsage -> execute(); 
$dtys = $rsage -> fetchAll(PDO::FETCH_OBJ); 
if($rsage -> rowCount() > 0)   { 
foreach($dtys as $rwage) {
	$nom_agente = $rwage -> agente;
}
}else{
	$nom_agente = "---";
} 

	  ?>
	  <tr>
	    <td><?=$itte;?></td>
   <td><?=$annio;?></td>
   <td><?=$fecha;?></td>
   <td><?=$adua;?></td>
   <td><?=$numdua;?></td>
   <td><?=$numdoc;?></td>
   <td><?=$nomempresa;?></td>
   <td><?=$direempresa;?></td>
   <td><?=$ubigeoempresa;?></td>
   <td><?=$ubigeoprovi;?></td>
   <td><?=$ubigeodistri;?></td>
   <td><?=$num_partida;?></td>
   <td><?=$descri_produ;?></td>
   <td><?=$pais_des;?></td>
   <td><?=$puerto_descri;?></td>
   <td><?=$via_transp;?></td>
   <td><?=$uni_transp;?></td>
   <td><?=$descri_mat;?></td>
   <td><?=$nom_agente;?></td>
   <td><?=$nom_aduanero;?></td>
   <td><?=$nom_banco;?></td>
   <td><?=$valor_fob;?></td>
   <td><?=$valor_net;?></td>
   <td><?=$valor_bru;?></td>
   <td><?=$valor_A;?></td>
   <td><?=$nom_unidad;?></td>
   <td><?=$valor_B;?></td>
   <td><?=$unid_comer;?></td>
   <td><?=$peso_unit;?></td>
   <td><?=$precio_unitmed;?></td>
   <td><?=$precio_unitcomerc;?></td>
   <td><?=$peso_envemb;?></td>
   <td><?=$nom_sector;?></td>	
		</tr> 
						
							<?php
}
}else{ 
	?>
	 <tr>
		<td colspan="33" align="center"><b>No Hay Datos</b></td>
	</tr>				
<?php
 }
	?>
					
						</tbody>				  
						<tfoot>
							<tr>
								<th>#</th>
   <th>A&ntilde;o</th>
   <th>Fecha</th>
   <th>Aduana</th>
   <th>Dua</th>
   <th>N#. Doc.</th>
   <th>Empresa</th>
   <th>Direcci&oacute;n</th>
   <th>Departamento</th>
   <th>Provincia</th>
   <th>Distrito</th>
   <th>N#. Partida</th>
   <th>Descrip.&nbsp;Prod.</th>
   <th>Pais</th>
   <th>Puerto</th>
   <th>Via Transp.</th>
   <th>Unid. Transp.</th>
   <th>Descrip. Transp.</th>
   <th>Agente</th>
   <th>Recinto Aduanero</th>
   <th>Banco</th>
   <th>Valor Fob.</th>
   <th>Peso Neto</th>
   <th>Peso Bruto</th>
   <th>Cant. Exportada</th>
   <th>Unid. Medida</th>
   <th>Cant. Comercial(Kg)</th>
   <th>Unid. Comerc.</th>
   <th>Precio Unit.(x Kg)</th>
   <th>Precio Unit. (x Unid.Med.)</th>
   <th>Precio Unit. (x Unid.Comerc.)</th>
   <th>Peso (Envase/Embalaje)</th>
   <th>Sector</th>
							</tr>
						</tfoot>
					</table>
					</div>
</div>              
</div>


<?php $conexpg = null;//cierra conexion  ?>

<script src="../assets/vendor_components/datatable/datatables.min.js"></script>
<!--<script src="js/pages/data-table.js"></script>-->

<script>
	$(document).ready(function () {
  $('#example').DataTable({
	  "order": [[ 0, "asc" ]],// columna 1
	  dom: 'Bfrtip',
		buttons: [
			'csv', 'excel'
		],
	  "pagingType": "full_numbers",
        "lengthMenu": [
            [25, 55, 80, -1],
            [25, 55, 80, "Todos"]
        ],
	  language: {
        "decimal":        "",
    "emptyTable":     "No hay datos",
    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
    "infoFiltered":   "(Filtro de _MAX_ total registros)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Mostrar _MENU_ registros",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search":         "Buscar:",
    "zeroRecords":    "No se encontraron coincidencias",
    "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "Próximo",
        "previous":   "Anterior"
    },
    "aria": {
        "sortAscending":  ": Activar orden de columna ascendente",
        "sortDescending": ": Activar orden de columna desendente"
    }
      }
	  
  });
  $('.dataTables_length').addClass('bs-select');
});
	</script>

