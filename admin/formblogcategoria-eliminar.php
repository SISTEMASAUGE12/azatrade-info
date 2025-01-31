<?php
include("incBD/inibd.php");
set_time_limit(150);

$cod = $_GET["log"];
$condi = $_GET["action"];

$Sql="update blog_cate Set estado='E' where idcate ='$cod' ";
$rs = $conexpg->query($Sql);
$ale="del";

	echo"<script>location.href='form-blog-categoria.php?var=$ale'</script>";
  ?>
