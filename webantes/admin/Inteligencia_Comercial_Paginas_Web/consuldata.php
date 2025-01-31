<?

include ("conection/config.php");
include ("menu.php");

$idbus = $_GET["idbus"];
//echo "$idbus xxxx<br>";
//se muestren las variables en los campos seleccionados

//if ($_SESSION['rol'] == 'ADMIN') {


$busx2 = $_POST['busq'];
//}else{

//$busx2 = $_POST['busq'];
//}
//echo "$busx2 sss <br>";
$temax2 = $_POST['tema'];
$prodx2 = $_POST['produ'];
$incix2 = $_POST['businsi'];

$paisx2 = $_POST['pais'];
$mercax2 = $_POST['merca'];
$sectox2 = $_POST['secto'];
$instx2 = $_POST['inst'];
$idiox2 = $_POST['idioma'];
$tdatox2 = $_POST['tdato'];
$alcax2 = $_POST['alcance'];
$taccex2 = $_POST['tacceso'];
$descrix2 = $_POST['descrpag'];
$variax2 = $_POST['varia'];

/*$busx2 = $_GET['busq'];
$temax2 = $_GET['tema'];
$prodx2 = $_GET['produ'];
$incix2 = $_GET['businsi'];

$paisx2 = $_GET['pais'];
$mercax2 = $_GET['merca'];
$sectox2 = $_GET['secto'];
$instx2 = $_GET['inst'];
$idiox2 = $_GET['idioma'];
$tdatox2 = $_GET['tdato'];
$alcax2 = $_GET['alcance'];
$taccex2 = $_GET['tacceso'];
$descrix2 = $_GET['descrpag'];
$variax2 = $_GET['varia'];*/

function generasector()
{
	//include 'conexion.php';
	//conectar();
	$consulta=mysql_query("SELECT id, sector FROM sector where eliminado='0'");
	//desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='sector' id='sector' onChange='cargaContenido(this.id)'>";
	echo "<option value=''>Todo</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}


/*$sqlp="SELECT p.id as idproducto,p.idsector as idsectorp,p.producto as nomprod,s.id as idsector,s.sector as nomsector,p.eliminado from producto as p inner join sector as s on p.idsector=s.id where p.eliminado='0' and p.id='$idp'";
$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	while($rowp = mysql_fetch_array($rsnp)){
		
		$ids = $rowp["idsector"];
		$idsec = $rowp["nomsector"];
		$idpp = $rowp["idproducto"];
		$nomp = $rowp["nomprod"];
		}
		}*/

$aa = date("Y");

?>

<!doctype html>
<html>
<head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> -->
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?  //echo "" ; ?>
<!--  -->
<!--  -->
<!-- -->
<title>Azatrade - Inteligencia Comercial</title>
 <link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet"> 
<style>
table {
  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size:12px;
}
</style>

 <script language="JavaScript">
<!-- Hide JavaScript from Java-cambia de color las filas de la tabla
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="#EBEBEB";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#FAFAFA";}}
//-->
</script>

<script language="javascript" type="text/javascript">
function valida(consultar) {
	
	bu =consultar.busq.value;
	te =consultar.tema.value;
	pro =consultar.produ.value;
	cla =consultar.businsi.value;
	pa =consultar.pais.value;
	me =consultar.merca.value;
	se =consultar.secto.value;
	ins =consultar.inst.value;
	idi =consultar.idioma.value;
	td =consultar.tdato.value;
	al =consultar.alcance.value;
	ta =consultar.tacceso.value;
	des =consultar.descrpag.value;
	vari =consultar.varia.value;
	
	//pprod =consultar.depa.value;
	//tiem =consultar.tiempo.value;
	//tiem =consultar.peri.value;
	
//in mecanicos
    if (bu < 1 && te <1  && pro <1 && cla <1 && pa <1 && me <1 && se <1 && ins <1 && ins <1 && idi <1 && td <1 && al <1 && ta <1 && des <1 && vari <1 ){
	
		alert("Seleccione Un Filtro de Busqueda");
		return false;
	}
	 /*if (consultar.prod.value.length < 1){
	
		alert("Seleccione Producto");
		return false;
	}
	if (consultar.med.value.length < 1){
	
		alert("Seleccione Unidad de Medida");
		return false;
	}
	if (consultar.tiempo.value.length < 1){
	
		alert("Seleccione Tiempo");
		return false;
	}*/
	
	/*	if (consultar.tiempo.value.length < 1)
	{
		alert("Seleccione Tiempo");
		return false;
	}
	if (consultar.peri.value.length < 1)
	{
		alert("Seleccione Periodo");
		return false;
	}*/
	//}
	//}
	
	return true;
}
</script>


<script type="text/javascript">
/*mostrar y  oculatr caja div*/
$(function()
{

$("#mostrar").click(function(event) {
event.preventDefault();
$("#caja").slideToggle();
});

$("#caja a").click(function(event) {
event.preventDefault();
$("#caja").slideUp();
});

});
</script>
<style type="text/css">
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #666666;	
}
a{color:#993300; text-decoration:none;}
#caja {
width:80%;
display: none;
padding:5px;
border:2px solid #FADDA9;
/*background-color:#FDF4E1;*/
background-color:#FAFAFA;
}
#mostrar{
display:block;
width:80%;
padding:5px;
border:2px solid #D0E8F4;
/*background-color:#ECF8FD;*/
background-color:#279CC9;

}
</style>

<script type="text/javascript" src="js/select_dependientes2.js"></script>


</head>

<body>
<br>
<p>

<!--<a href="#" id="mostrar">Opciones Avanzada</a>
<div id="caja">
<a href="#" class="close">[x]</a> -->
<center>
<form name="consultar" method="post" action="consulpag.php?idbus=<? echo "$idbus"; ?>" onSubmit="return valida(this);" >
<table  border="0" bordercolor="#00CCFF" style='background-color:#FAFAFA;
   color:#039;
   width: 300px;
   padding: 10px;
   border:2px solid #B2B2B2;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
  <tbody>
    <tr>
    <td bgcolor="#279CC9"  colspan="11" align="center">
   <b><font color="#FFFFFF">Informes de Consultas</font></b>
    </td>
    </tr>
    <tr>
      <td>
      <!--<input type="hidden" name='sector' id='sector' />  -->
      Seleccione Tipo Busqueda:
      </td>
      <td>
      <?php //generasector(); ?>
      <?
      //si es administrador muestra para que seleccione
      if ($_SESSION['rol'] == 'ADMIN') {
      
echo "<select name='busq'>"; 
if ($busx2!=''){
	echo"<option value=''>Todo</option>";
	$querypro = "SELECT id, busqueda FROM pag_tipo_bus order by busqueda";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["busqueda"].'"';
if($_POST["busq"]==$filapro["busqueda"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["busqueda"].'</option>';   
}
					
}else{
	echo"<option value=''>Todo</option>";
	$ssql="SELECT id, busqueda FROM pag_tipo_bus order by busqueda";
}
					
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[1]'>$fila[1]"; 
					}
					echo "</select>";
	}else{// fin seleccion como adminsitrador y  de caso contrario muestra como usuario segun el sistema que halla entrado
	echo "<select name='busq'>"; 
if ($busx2!=''){
	//echo"<option value=''>Todo</option>";
	
	$querypro = "SELECT id, busqueda FROM pag_tipo_bus where busqueda ='$idbus' order by busqueda";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["busqueda"].'"';
if($_POST["busq"]==$filapro["busqueda"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["busqueda"].'</option>';   
}
					
}else{
	//echo"<option value=''>Todo</option>";
	$ssql="SELECT id, busqueda FROM pag_tipo_bus where busqueda ='$idbus' order by busqueda";
}
					
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[1]'>$fila[1]"; 
					}
					echo "</select>";
	}// fin seleccion como basico u otro rol menos como administrador
					?>
      </td>
      <td>Seleccione tema</td>
      <td>
      
      <?
echo "<select name='tema'>"; 
if ($temax2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, tema FROM pag_tema order by tema";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["tema"].'"';
if($_POST["tema"]==$filapro["tema"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["tema"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, tema FROM pag_tema order by tema";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";?>
                    
      <!--<select disabled="disabled" name="prod" id="prod">
						<option value="">Todo</option>
					</select> -->
      </td>
     
    <!--</tr>
    <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> -->
      <td>Seleccione Producto:</td>
      <td>
      <?
      header('Content-Type: text/html; charset=UTF-8'); 
echo "<select name='produ'>"; 
if ($prodx2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, producto FROM producto where eliminado='0' order by producto";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.utf8_encode($filapro["producto"]).'"';
if($_POST["produ"]==$filapro["producto"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["producto"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, producto FROM producto where eliminado='0' order by producto ";
}
					
					$resultadox=mysql_query($sqlx);
					
					while ($filax=mysql_fetch_row($resultadox))
					{ 
					//$az= utf8_decode($filax[1]);
						echo "<option value='$filax[1]'>$filax[1]"; 
						//echo "<option value='$filax[1]'>$az"; 
					}
					echo "</select>";?>
      
                    
                    
      <?
/*echo "<select name='prod'>"; 
if ($prodx2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, producto FROM producto where eliminado='0' group by id, producto";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["producto"].'"';
if($_POST["prod"]==$filapro["producto"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["producto"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, producto FROM producto where eliminado='0' group by id, producto";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";*/
					?>
      </td>
      
      
      
       <td>Busqueda por Palabra Clave:</td>
      <td>
      <input name="businsi" type="text" size="45" value="<? echo $incix2; ?>"/>
      <?
/*echo "<select name='depa'>"; 
if ($depx2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT coddep, departamento FROM departamento where eliminado='0'";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["departamento"].'"';
if($_POST["depa"]==$filapro["departamento"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["departamento"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";

	$sql="SELECT coddep, departamento FROM departamento where eliminado='0'";
}
					
					$resultadod=mysql_query($sql); 
					while ($filad=mysql_fetch_row($resultadod))
					{ 
						echo "<option value='$filad[1]'>$filad[1]"; 
					}
					echo "</select>";*/
					?>
      </td>
      
    </tr>
    </table>
    
   <a href="#" id="mostrar">Seleccion de Busquedas Avanzadas</a>
<div id="caja">
<a href="#" class="close">[x]</a>
 <table>
      <tr>
      
      <td>Pais:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>
      <?
      echo "<select name='pais'>"; 
if ($paisx2!=''){
	echo"<option value=''>Todo</option>";
			$querypro = "SELECT id, pais FROM merca_pais where pais<>'' order by pais";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);


echo '<option value="'.$filapro["pais"].'"';
if($_POST["pais"]==$filapro["pais"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["pais"].'</option>';   
}		

}else{

	echo"<option value=''>Todo</option>";
	
	$sqlp="SELECT id, pais FROM merca_pais where pais<>'' order by pais";
}
					
					$resultadop=mysql_query($sqlp); 
					while ($filap=mysql_fetch_row($resultadop))
					{ 
						echo "<option value='$filap[1]'>$filap[1]"; 
					}
					echo "</select>";
					?>
      </td>
   <!-- </tr>
    <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> -->
      <td>Mercado:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>
      <?
echo "<select name='merca'>"; 
if ($mercax2!=''){
	echo"<option value=''>Todo</option>";
			$querypro = "SELECT id, pais FROM merca_pais where pais<>'' order by pais";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);


echo '<option value="'.$filapro["pais"].'"';
if($_POST["merca"]==$filapro["pais"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["pais"].'</option>';   
}		

}else{

	echo"<option value=''>Todo</option>";
	
	$sqlp="SELECT id, pais FROM merca_pais where pais<>'' order by pais";
}
					
					$resultadop=mysql_query($sqlp); 
					while ($filap=mysql_fetch_row($resultadop))
					{ 
						echo "<option value='$filap[1]'>$filap[1]"; 
					}
					echo "</select>";?>
      </td>
      
      </tr>
      <tr>
      
      <td>Sector:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>
      <?
echo "<select name='secto'>"; 
if ($sectox2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, sector FROM sector where eliminado='0' order by sector";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["sector"].'"';
if($_POST["secto"]==$filapro["sector"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["sector"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, sector FROM sector where eliminado='0' order by sector";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";?>

      </td>
      
      <td>Institucion:</td>
      <td>
      <?
echo "<select name='inst'>"; 
if ($instx2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, institucion FROM pag_institucion order by institucion";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["institucion"].'"';
if($_POST["inst"]==$filapro["institucion"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["institucion"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, institucion FROM pag_institucion order by institucion";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";?>

      </td>
      </tr>
      <!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>  -->
      <tr>
    <td>Idioma:</td>
      <td>
      <?
echo "<select name='idioma'>"; 
if ($idiox2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, idioma FROM pag_idioma order by idioma";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["idioma"].'"';
if($_POST["idioma"]==$filapro["idioma"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["idioma"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, idioma FROM pag_idioma order by idioma";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";?>

      </td>
      
     
      <td>Tipo Dato:</td>
      <td>
      <?
echo "<select name='tdato'>"; 
if ($tdatox2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, tipo_dato FROM pag_tipo_dato order by tipo_dato";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["tipo_dato"].'"';
if($_POST["tdato"]==$filapro["tipo_dato"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["tipo_dato"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, tipo_dato FROM pag_tipo_dato order by tipo_dato";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";?>

      </td>
       </tr>
      <tr>
      <td>Alcance:</td>
      <td>
      <?
echo "<select name='alcance'>"; 
if ($alcax2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, alcance FROM pag_alcance order by alcance";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["alcance"].'"';
if($_POST["alcance"]==$filapro["alcance"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["alcance"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, alcance FROM pag_alcance order by alcance";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";?>

      </td>
      
      
      
      <td>Tipo Acceso:</td>
      <td>
      <?
echo "<select name='tacceso'>"; 
if ($taccex2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, tipo_acceso FROM pag_tipo_acceso order by tipo_acceso";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["tipo_acceso"].'"';
if($_POST["tacceso"]==$filapro["tipo_acceso"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["tipo_acceso"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, tipo_acceso FROM pag_tipo_acceso order by tipo_acceso";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";?>

      </td>
      
      </tr>
      <tr>
    
      
       <td>Ingrese Descripcion de la Pagina:</td>
      <td>
      <input name="descrpag" type="text" size="35" value="<? echo $descrix2;?>"/>
      <?
/*echo "<select name='med'>"; 
if ($medx2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, medida FROM medida where eliminado='0' group by id, medida";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["medida"].'"';
if($_POST["med"]==$filapro["medida"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["medida"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, medida FROM medida where eliminado='0' group by id, medida";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";*/
					?>

      </td>
      
     
       <td>Variable de Analisis:</td>
      <td>
      <?
echo "<select name='varia'>"; 
if ($variax2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, variable FROM variable where eliminado='0' order by variable";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["variable"].'"';
if($_POST["varia"]==$filapro["variable"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["variable"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, variable FROM variable where eliminado='0' order by variable";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";?>

      </td>
    
    
    </tr>
    </table>
  </div>
  <table>
    <!-- <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> -->
    <tr>
    <td colspan="8" align="center">
    <input name="consultar"  type="submit" value="Consultar"><img src="img/consult.png">
    </td>
    </tr>
  </tbody>
</table>
</form>
<!--</div> -->


<?
if (isset($consultar)){
	
	//echo"<link href='bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css' rel='stylesheet'>";
	
/*	if ($sect!=""){

$sqlpg="SELECT
sect.id AS ids,
sect.sector,
depa.id AS idd,
depa.coddep,
depa.departamento,
prod.id AS idp,
prod.producto,
var.id AS idv,
var.variable,
med.id AS idm,
med.medida,
dp.periodo,
dp.mes2,
SUM(dp.enero) as enero,
SUM(dp.febrero) as febrero,
SUM(dp.marzo) as marzo,
SUM(dp.abril) as abril,
SUM(dp.mayo) as mayo,
SUM(dp.junio) as junio,
SUM(dp.julio) as julio,
SUM(dp.agosto) as agosto,
SUM(dp.septiembre) as septiembre,
SUM(dp.octubre) as octubre,
SUM(dp.noviembre) as noviembre,
SUM(dp.diciembre) as diciembre,
CONCAT(depa.departamento,prod.producto,dp.mes2,dp.periodo) AS todo,
dp.eliminado
FROM
dataproduccion AS dp
INNER JOIN departamento AS depa ON dp.iddepartamento = depa.id
INNER JOIN medida AS med ON dp.idmedida = med.id
INNER JOIN producto AS prod ON dp.idproducto = prod.id
INNER JOIN sector AS sect ON dp.idsector = sect.id
INNER JOIN variable AS var ON dp.idvariable = var.id
WHERE
dp.eliminado = '0' AND
dp.idsector LIKE '%".$sect."%' AND
CONCAT(depa.departamento,prod.producto,dp.mes2,dp.periodo) LIKE '".$depa."%".$prod."%".$tiempo."%".$peri."'
GROUP BY
ids,
sect.sector,
idd,
depa.coddep,
depa.departamento,
idp,
prod.producto,
idv,
var.variable,
idm,
med.medida,
dp.periodo,
dp.mes2
";
}

$rsnpg = mysql_query($sqlpg);
if (mysql_num_rows($rsnpg) > 0){
	
	//sql para mostra el sector
	$sqlc="SELECT sector.id, sector.sector, sector.eliminado FROM sector WHERE sector.id = '".$sect."'";
$rsnc = mysql_query($sqlc);
if (mysql_num_rows($rsnc) > 0){
	while($rowc = mysql_fetch_array($rsnc)){
$secto = $rowc["sector"];
	}
	}
	
	// sql para mostrar producto
	$sqlp="SELECT producto.id, producto.producto FROM producto WHERE producto.producto ='".$prod."'";
$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	while($rowp = mysql_fetch_array($rsnp)){
$produc = $rowp["producto"];
	}
	}
	
echo "<center>";
echo "<br>";
echo "<table border = '1' bordercolor='#00CCFF' style='background-color:#CCFFFF;
   color:#039;
   width: 300px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>";
   echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";

echo "<td bgcolor='#66CCFF' colspan='18'><b>Sector: $secto / $produc</b></td>";
echo "</tr>";
echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<td bgcolor='#66CCFF'><b><center>Items</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Periodo</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Departamento</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Producto</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Unidad</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Tiempo</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Enero</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Febrero</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Marzo</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Abril</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Mayo</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Junio</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Julio</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Agosto</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Septiembre</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Octubre</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Noviembre</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Diciembre</center></b></td>";
echo "</tr>";

while($rowpg = mysql_fetch_array($rsnpg)){*/
/*$cod = $rowpg["id_prog"];
$codf = $rowpg["numero_recibo"];*/
/*
$items=$items+1;

echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<td><center>".$items."</center></td> ";
echo "<td><center>".$rowpg["periodo"]."</center></td> ";
echo "<td><center>".$rowpg["departamento"]."</center></td> ";
echo "<td><center> ".$rowpg["producto"]."</center></td>";
echo "<td><center> ".$rowpg["medida"]."</center></td>";
echo "<td><center> ".$rowpg["mes2"]."</center></td>";
echo "<td><center> ".$rowpg["enero"]."</center></td>";
echo "<td><center> ".$rowpg["febrero"]."</center></td>";
echo "<td><center> ".$rowpg["marzo"]."</center></td>";
echo "<td><center> ".$rowpg["abril"]."</center></td>";
echo "<td><center> ".$rowpg["mayo"]."</center></td>";
echo "<td><center> ".$rowpg["junio"]."</center></td>";
echo "<td><center> ".$rowpg["julio"]."</center></td>";
echo "<td><center> ".$rowpg["agosto"]."</center></td>";
echo "<td><center> ".$rowpg["septiembre"]."</center></td>";
echo "<td><center> ".$rowpg["octubre"]."</center></td>";
echo "<td><center> ".$rowpg["noviembre"]."</center></td>";
echo "<td><center> ".$rowpg["diciembre"]."</center></td>";

echo "</tr> ";

//echo"<p>".$_pagi_navegacion."</p>";
}
}else 
{

echo " <br><center><b>No hay Registro Segun Filtros<b></center>";
}
	*/
	
	
	}
	?>

</body>
</html>