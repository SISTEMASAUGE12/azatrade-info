<?
include ("conection/config.php");

$cod=$_GET["true"];

$rsh=("delete from pag_datapagina where id='$cod'");
   mysql_query($rsh,$link); 
   mysql_close($link);
   
   ?>
   <script>location.href="vista_active.php"</script>