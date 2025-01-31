<?
include ("conection/config.php");

$cod=$_GET["cod"];

//$rsh=("update merca_pais set eliminado=1 where id='$cod'");
$rsh=("delete from pag_tipo_bus where id='$cod'");
   mysql_query($rsh,$link); 
//header("Location: vistaproducto.php");
   mysql_close($link);
   
   ?>
   <script>location.href="vistatbusqueda.php"</script>