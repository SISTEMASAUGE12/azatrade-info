<?
include ("conection/config.php");

$cod= $_GET["cod"];
$rsh=("update medida set eliminado=1 where id='$cod'");
   mysql_query($rsh,$link); 
//header("Location: vistaproducto.php");
   mysql_close($link);
   
   ?>
   <script>location.href="vistamedida.php"</script>