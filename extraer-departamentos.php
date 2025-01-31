<?php
require 'conex/inibd.php';

// Número de registros recuperados
$numberofrecords = 5;

if(!isset($_POST['searchTerm'])){

   // Obtener registros a tarves de la consulta SQL
   $stmt = $conexpg->prepare("SELECT g.iddepartamento as DNOMBRE1A, g.nombre as DNOMBRE2 FROM departamento AS g ORDER BY g.nombre LIMIT :limit");
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   $lista_productos = $stmt->fetchAll();

}else{

   $search = $_POST['searchTerm'];// Search text

   //Mostrar resultados
	$stmt = $conexpg->prepare("SELECT p.iddepartamento as DNOMBRE1A, p.nombre as DNOMBRE2 FROM departamento AS p WHERE p.nombre LIKE :DNOMBRE2 LIMIT :limit");
   $stmt->bindValue(':DNOMBRE2', '%'.$search.'%', PDO::PARAM_STR);
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   //Variable en array para ser procesado en el ciclo foreach
   $lista_productos = $stmt->fetchAll();

}

$response = array();

// Leer los datos de MySQL
foreach($lista_productos as $pro){
   $response[] = array(
      "id" => $pro['DNOMBRE1A'],
      "text" => $pro['DNOMBRE2']
	   //"text" => $pro['DNOMBRE2'].' - '.$pro['NDOC']
   );
}

echo json_encode($response);
exit();
?>