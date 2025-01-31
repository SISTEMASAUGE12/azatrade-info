<?
include ("conection/config.php");

/*$link=mysql_connect("localhost", "root", "jopedis");
mysql_select_db("produccion",$link) OR DIE ("Error: No es posible establecer la conexión");*/

$m=$_POST["mes"];

//if ($m=="Enero"){
	
$sec = $_POST["sector"]; 
$departa =  $_POST["depa"]; 
$prod = $_POST["produ"]; 
$und = $_POST["unidad"]; 
$vari = $_POST["varia"];
$aa = $_POST["periodo"];
$mes2 = $_POST["mes2"]; 
$me = $_POST["mes"]; 
$mon = $_POST["monto"];

/*$Sql="insert into dataproduccion(id,idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec','$departa','$prod','$und','$vari','$aa','$per','$me','$mon','0','0','0','0','0','0','0','0','0','0','0','0')";*/

//}
if ($me == "Enero"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', '$mon', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,'0')";
}
if ($me == "Febrero"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', 0,'$mon', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0','0')";
}
if ($me == "Marzo"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', 0, 0, '$mon', 0, 0, 0, 0, 0, 0, 0, 0, 0,'0')";
}
if ($me == "Abril"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', 0, 0, 0, '$mon', 0, 0, 0, 0, 0, 0, 0, 0,'0')";
}

if ($me === "Mayo"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', 0, 0, 0, 0, '$mon', 0, 0, 0, 0, 0, 0, 0,'0')";
}
if ($me == "Junio"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', 0, 0, 0, 0, 0, '$mon', 0, 0, 0, 0, 0, 0,'0')";
}
if ($me == "Julio"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', 0, 0, 0, 0, 0, 0, $mon, 0, 0, 0, 0, 0,'0')";
}
if ($me == "Agosto"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', 0, 0, 0, 0, 0, 0, 0, '$mon', 0, 0, 0,0,'0')";
}
if ($me == "Septiembre"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', 0, 0, 0, 0, 0, 0, 0, 0, '$mon', 0, 0,0,'0')";
}
if ($me == "Octubre"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', 0, 0, 0, 0, 0, 0, 0, 0, 0, '$mon', 0,0,'0')";
}
if ($me == "Noviembre"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$mon','0','0')";
}
if ($me == "Diciembre"){
	$Sql="insert into dataproduccion(idsector, iddepartamento, idproducto, idvariable, idmedida, periodo, mes, mes2, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, eliminado) values ('$sec', '$departa', '$prod', '$vari', '$und', '$aa', '$me', '$mes2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,'$mon','0')";
}

//con este script vemos si llego a registrarse o no
/*$resultado3=mysql_query($Sql,$link) or die (mysql_error());
if (!$resultado3){
          return false;
		  
       } else{
			
            return true;
			
			}*/
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
  header("Location: RegProducdat.php");
   mysql_close($link);
  
   

   
?>