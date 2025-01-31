<?php
include("incBD/inibd.php");
set_time_limit(150);

$cod = $_GET["log"];
$condi = $_GET["action"];

$Sql="update blog Set estado='E' where idblog ='$cod' ";
$rs = $conexpg->query($Sql);
$ale="del";

	echo"<script>location.href='form-blog-lista.php?var=$ale'</script>";
  ?>
