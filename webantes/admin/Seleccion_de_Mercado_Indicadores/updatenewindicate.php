<?
include ("conection/config.php");
	
	$codixind=$_POST['codindx'];
	$codtemx=$_POST['tema'];
	$nindicate=$_POST['nomind'];
	$fnota=$_POST['fuenten'];
	$forgani=$_POST['fuenteo'];
	
	/*echo "$codixind <br>";
	echo "$codtemx <br>";
	echo "$nindicate <br>";
	echo "$fnota <br>";
	echo "$forgani <br>";*/

	//actualizamos indicador 
//$Sql="update merca_indicadores set idtema='$codtemx', nom_indicador='$nindicate', fuente_nota='$fnota', fuente_org='$forgani' where cod_indicador='$codixind'";
   //smysql_query($Sql,$link); 
   
    $update=mysql_query("UPDATE merca_indicadores SET idtema='$codtemx', nom_indicador='$nindicate', fuente_nota='$fnota', fuente_org='$forgani' WHERE cod_indicador='$codixind'" , $link ) or die ( 'Problemas con el query' . mysql_error ( ) ) ; 
   
   $linea = "5"; 
   for ( $i=0 ; $i<=$linea; $i++) 
  { 
  $year=$_POST['year'][$i];
  
  //echo "$year x<br>";
  
  //actualiza primer año
  if($year=='2010'){
	  
	 // echo "{$_POST['iddata'][$i]} <br>";
	  
	$update = mysql_query("UPDATE merca_datamercado SET  idtema='codtemx', cod_pais='{$_POST['Pais'][$i]}', a2010='{$_POST['valor'][$i]}', a2011='0' , a2012='0', a2013='0', a2014='0' WHERE id='{$_POST['iddata'][$i]}'" , $link ) or die ( 'Problemas con el query' . mysql_error ( ) ) ; 
  }//fin actualiza primer año
  
  //actualiza segundo año
  if($year=='2011'){
	//  echo "{$_POST['iddata'][$i]} <br>";
	 $update = mysql_query("UPDATE merca_datamercado SET  idtema='codtemx', cod_pais='{$_POST['Pais'][$i]}', a2010='0', a2011='{$_POST['valor'][$i]}' , a2012='0', a2013='0', a2014='0' WHERE id='{$_POST['iddata'][$i]}'" , $link ) or die ( 'Problemas con el query' . mysql_error ( ) ) ; 
  }//fin actualiza segundo año
  
  //actualiza tercer año
  if($year=='2012'){
	 $update = mysql_query("UPDATE merca_datamercado SET  idtema='codtemx', cod_pais='{$_POST['Pais'][$i]}', a2010='0', a2011='0' , a2012='{$_POST['valor'][$i]}', a2013='0', a2014='0' WHERE id='{$_POST['iddata'][$i]}'" , $link ) or die ( 'Problemas con el query' . mysql_error ( ) ) ; 
  }//fin actualiza tercer año
  
  //actualiza cuarto año
  if($year=='2013'){
	  $update = mysql_query("UPDATE merca_datamercado SET  idtema='codtemx', cod_pais='{$_POST['Pais'][$i]}', a2010='0', a2011='0' , a2012='0', a2013='{$_POST['valor'][$i]}', a2014='0' WHERE id='{$_POST['iddata'][$i]}'" , $link ) or die ( 'Problemas con el query' . mysql_error ( ) ) ; 
  }//fin actualiza cuarto año
  
  //actualiza quinto año
  if($year=='2014'){
	 $update = mysql_query("UPDATE merca_datamercado SET  idtema='codtemx', cod_pais='{$_POST['Pais'][$i]}', a2010='0', a2011='0' , a2012='0', a2013='0', a2014='{$_POST['valor'][$i]}' WHERE id='{$_POST['iddata'][$i]}'" , $link ) or die ( 'Problemas con el query' . mysql_error ( ) ) ; 
  }//fin actualiza quinto año
  
  }
   
   
   header("Location: viewindicate.php");
   mysql_close($link);
   
?>