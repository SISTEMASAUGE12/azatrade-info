<?

include ("conection/config.php");


$Codigo= $_POST['codiprod']; 
/*$Codigo_porc= $_POST['porcen']; 
$Codigo_v1= $_POST['val1'];
$Codigo_v2= $_POST['val2'];
$Codigo_v3= $_POST['val3'];
$Codigo_v4= $_POST['val4'];
$Codigo_v5= $_POST['val5'];*/
$linea = $_POST['linea']; 

//echo "$Codigo";




for ( $i=0 ; $i<=$linea; $i++) 
  { 
  $ss2=$_POST['porcen'][$i];
  $ss3=$_POST['val1'][$i];
  $r1=($ss2 * $ss3)/100;
  
  $ss4=$_POST['porcen'][$i];
  $ss5=$_POST['val2'][$i];
  $r2=($ss4 * $ss5)/100;
  
  $ss6=$_POST['porcen'][$i];
  $ss7=$_POST['val3'][$i];
  $r3=($ss6 * $ss7)/100;
  
  $ss8=$_POST['porcen'][$i];
  $ss9=$_POST['val4'][$i];
  $r4=($ss8 * $ss9)/100;
  
  $ss10=$_POST['porcen'][$i];
  $ss11=$_POST['val5'][$i];
  $r5=($ss10 * $ss11)/100;
 // echo "$ss2";
 
  $update = mysql_query("UPDATE merca_temp_indi SET porcentaje='{$_POST['porcen'][$i]}', valor1='{$_POST['val1'][$i]}' , valor2='{$_POST['val2'][$i]}', valor3='{$_POST['val3'][$i]}', valor4='{$_POST['val4'][$i]}', valor5='{$_POST['val5'][$i]}' WHERE id_indi='{$_POST['id_idi'][$i]}'" , $link ) or die ( 'Problemas con el query' . mysql_error ( ) ) ; 
  //echo $update . "<br/>" ; 
  
  
  $update = mysql_query("UPDATE merca_temp_indi SET resul1='$r1', resul2='$r2' , resul3='$r3', resul4='$r4', resul5='$r5' WHERE id_indi='{$_POST['id_idi'][$i]}'" , $link ) or die ( 'Problemas con el query' . mysql_error ( ) ) ; 
  
  
  } 


 header("Location: viewreslt2.php?prim=$Codigo");

?>