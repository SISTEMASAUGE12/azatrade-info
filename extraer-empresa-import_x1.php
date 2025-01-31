<?php
require 'conex/inibd.php';

// Número de registros recuperados
$numberofrecords = 5;

if(!isset($_POST['searchTerm'])){

   // Obtener registros a tarves de la consulta SQL
   $stmt = $conexpg->prepare("SELECT CONCAT(g.razon_social,g.ruc) as DNOMBRE1A, CONCAT(g.razon_social,' - ',g.ruc) as DNOMBRE2 FROM padron_reducido_ruc AS g ORDER BY g.razon_social LIMIT :limit");
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   $lista_productos = $stmt->fetchAll();

}else{

   $search = $_POST['searchTerm'];// Search text

   // Mostrar resultados
   $stmt = $conexpg->prepare("SELECT CONCAT(p.razon_social,p.ruc) as DNOMBRE1A, CONCAT(p.razon_social,' - ',p.ruc) as DNOMBRE2 FROM padron_reducido_ruc AS p WHERE CONCAT(p.razon_social,p.ruc) LIKE :DNOMBRE1A  LIMIT :limit");
   $stmt->bindValue(':DNOMBRE1A', '%'.$search.'%', PDO::PARAM_STR);
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