<?
include ("conection/config.php");

$idp= $_GET["idp"];
$rsh=("update producto set eliminado=1 where id='$idp'");
   mysql_query($rsh,$link); 
//header("Location: vistaproducto.php");
   mysql_close($link);
   
   ?>
   <script>location.href="vistaproducto.php"</script>
   
   
   