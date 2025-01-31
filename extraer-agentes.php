<?php
require 'conex/inibd.php';

// Número de registros recuperados
$numberofrecords = 5;

if(!isset($_POST['searchTerm'])){

   // Obtener registros a tarves de la consulta SQL
   $stmt = $conexpg->prepare("SELECT g.idagente as DNOMBRE1A, g.agencia as DNOMBRE2 FROM agente AS g GROUP BY g.idagente,g.agencia ORDER BY g.idagente,g.agencia LIMIT :limit");
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   $lista_productos = $stmt->fetchAll();

}else{

   $search = $_POST['searchTerm'];// Search text

   //Mostrar resultados
	$stmt = $conexpg->prepare("SELECT P.idagente as DNOMBRE1A, P.agencia as DNOMBRE2 FROM agente AS p WHERE CONCAT(p.idagente,p.agencia) LIKE :DNOMBRE1A GROUP BY p.idagente,p.agencia LIMIT :limit");
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