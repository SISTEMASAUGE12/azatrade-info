<?php
include("incBD/inibd.php");
set_time_limit(150);

$cod = $_GET["log"];
$condi = $_GET["action"];

$Sql="update blog_comentarios Set estado='E' where idcomen ='$cod' ";
$rs = $conexpg->query($Sql);
$ale="del";

	echo"<script>location.href='form-blog-coment.php?var=$ale'</script>";
  ?>
