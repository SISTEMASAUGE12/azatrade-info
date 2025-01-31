<?
include ("conection/config.php");

$cod=$_GET["true"];

$rsh=("update pag_datapagina set estado=1 where id='$cod'");
   mysql_query($rsh,$link); 
//header("Location: vistaproducto.php");
   mysql_close($link);
   
   ?>
   <script>location.href="vista_active.php"</script>