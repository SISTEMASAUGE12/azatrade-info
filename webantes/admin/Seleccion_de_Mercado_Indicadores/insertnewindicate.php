<?
include ("conection/config.php");


/*$ipda=$_POST["ax"];

if ($ipda!=''){
	$rsh=("update producto set producto='".$_POST["a"]."' where id='$ipda'");
   mysql_query($rsh,$link); 
header("Location: vistaproducto.php");
   mysql_close($link);
	
	}else{*/
	// indicamos si no hay valor no se inserta
	
	
	$flat=$_POST['Pais'];
	$codixind=$_POST['codind'];
	$codtemx=$_POST['tema'];
if($flat!=''){ 
$Sql="insert into merca_indicadores (
  cod_indicador,
  idtema,
  id_produc,
  nom_indicador,
  fuente_nota,
  fuente_org,
  valor,
  valor_mayor_puntaje,
  origen,
  usuario,
  fecha_reg
)  values ('".$_POST["codind"]."',
'".$_POST["tema"]."',
'',
'".$_POST["nomind"]."',
'".$_POST["fuenten"]."',
'".$_POST["fuenteo"]."',
'0',
'',
'nuevoind',
'',
now())";

// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   
   
   $linea = "5"; 
   for ( $i=0 ; $i<=$linea; $i++) 
  { 
  $year=$_POST['year'][$i];
  
  //inserta primer año
  if($year=='2010'){
	 $datamerca="insert into merca_datamercado(idtema, cod_pais, cod_indicador, a1960, a1961, a1962, a1963, a1964, a1965, a1966, a1967, a1968, a1969, a1970, a1971, a1972, a1973, a1974, a1975, a1976, a1977, a1978, a1979, a1980, a1981, a1982, a1983, a1984, a1985, a1986, a1987, a1988, a1989, a1990, a1991, a1992, a1993, a1994, a1995, a1996, a1997, a1998, a1999, a2000, a2001, a2002, a2003, a2004, a2005, a2006, a2007, a2008, a2009, a2010, a2011, a2012, a2013, a2014, a2015, a2016) 
values( '$codtemx', '{$_POST['Pais'][$i]}', '$codixind', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{$_POST['Valor'][$i]}', 0, 0, 0, 0, 0, 0 )";
   $resultado=mysql_query($datamerca,$link) or die ( mysql_error ());
  }//fin insercion primer año
  
  //inserta segundo año
  if($year=='2011'){
	 $datamerca="insert into merca_datamercado(idtema, cod_pais, cod_indicador, a1960, a1961, a1962, a1963, a1964, a1965, a1966, a1967, a1968, a1969, a1970, a1971, a1972, a1973, a1974, a1975, a1976, a1977, a1978, a1979, a1980, a1981, a1982, a1983, a1984, a1985, a1986, a1987, a1988, a1989, a1990, a1991, a1992, a1993, a1994, a1995, a1996, a1997, a1998, a1999, a2000, a2001, a2002, a2003, a2004, a2005, a2006, a2007, a2008, a2009, a2010, a2011, a2012, a2013, a2014, a2015, a2016) 
values( '$codtemx', '{$_POST['Pais'][$i]}', '$codixind', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{$_POST['Valor'][$i]}', 0, 0, 0, 0, 0 )";
   $resultado=mysql_query($datamerca,$link) or die ( mysql_error ());
  }//fin insercion segundo año
  
  //inserta tercer año
  if($year=='2012'){
	 $datamerca="insert into merca_datamercado(idtema, cod_pais, cod_indicador, a1960, a1961, a1962, a1963, a1964, a1965, a1966, a1967, a1968, a1969, a1970, a1971, a1972, a1973, a1974, a1975, a1976, a1977, a1978, a1979, a1980, a1981, a1982, a1983, a1984, a1985, a1986, a1987, a1988, a1989, a1990, a1991, a1992, a1993, a1994, a1995, a1996, a1997, a1998, a1999, a2000, a2001, a2002, a2003, a2004, a2005, a2006, a2007, a2008, a2009, a2010, a2011, a2012, a2013, a2014, a2015, a2016) 
values( '$codtemx', '{$_POST['Pais'][$i]}', '$codixind', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{$_POST['Valor'][$i]}', 0, 0, 0, 0 )";
   $resultado=mysql_query($datamerca,$link) or die ( mysql_error ());
  }//fin insercion tercer año
  
  //inserta cuarto año
  if($year=='2013'){
	 $datamerca="insert into merca_datamercado(idtema, cod_pais, cod_indicador, a1960, a1961, a1962, a1963, a1964, a1965, a1966, a1967, a1968, a1969, a1970, a1971, a1972, a1973, a1974, a1975, a1976, a1977, a1978, a1979, a1980, a1981, a1982, a1983, a1984, a1985, a1986, a1987, a1988, a1989, a1990, a1991, a1992, a1993, a1994, a1995, a1996, a1997, a1998, a1999, a2000, a2001, a2002, a2003, a2004, a2005, a2006, a2007, a2008, a2009, a2010, a2011, a2012, a2013, a2014, a2015, a2016) 
values( '$codtemx', '{$_POST['Pais'][$i]}', '$codixind', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{$_POST['Valor'][$i]}', 0, 0, 0 )";
   $resultado=mysql_query($datamerca,$link) or die ( mysql_error ()); 
  }//fin insercion cuarto año
  
  //inserta quinto año
  if($year=='2014'){
	 $datamerca="insert into merca_datamercado(idtema, cod_pais, cod_indicador, a1960, a1961, a1962, a1963, a1964, a1965, a1966, a1967, a1968, a1969, a1970, a1971, a1972, a1973, a1974, a1975, a1976, a1977, a1978, a1979, a1980, a1981, a1982, a1983, a1984, a1985, a1986, a1987, a1988, a1989, a1990, a1991, a1992, a1993, a1994, a1995, a1996, a1997, a1998, a1999, a2000, a2001, a2002, a2003, a2004, a2005, a2006, a2007, a2008, a2009, a2010, a2011, a2012, a2013, a2014, a2015, a2016) 
values( '$codtemx', '{$_POST['Pais'][$i]}', '$codixind', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{$_POST['Valor'][$i]}', 0, 0 )";
   $resultado=mysql_query($datamerca,$link) or die ( mysql_error ());
  }//fin insercion quinto año
  
  }
   
   }// fin de condicion de insercion de valor
   
    //insertamos dato del valor ingresado
  /*if ($_POST["a"]=='2015'){
	  
   $datamerca="insert into merca_datamercado(idtema, cod_pais, cod_indicador, a1960, a1961, a1962, a1963, a1964, a1965, a1966, a1967, a1968, a1969, a1970, a1971, a1972, a1973, a1974, a1975, a1976, a1977, a1978, a1979, a1980, a1981, a1982, a1983, a1984, a1985, a1986, a1987, a1988, a1989, a1990, a1991, a1992, a1993, a1994, a1995, a1996, a1997, a1998, a1999, a2000, a2001, a2002, a2003, a2004, a2005, a2006, a2007, a2008, a2009, a2010, a2011, a2012, a2013, a2014, a2015, a2016) 
values( '".$_POST["tema"]."', '".$_POST["pais"]."', '".$_POST["codind"]."', 0, 0, 0,
0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '".$_POST["valor"]."', 0 )";
   $resultado=mysql_query($datamerca,$link) or die ( mysql_error ());; 
   
   }else{
      if ($_POST["a"]=='2016'){
	   
   $datamerca="insert into merca_datamercado(idtema, cod_pais, cod_indicador, a1960, a1961, a1962, a1963, a1964, a1965, a1966, a1967, a1968, a1969, a1970, a1971, a1972, a1973, a1974, a1975, a1976, a1977, a1978, a1979, a1980, a1981, a1982, a1983, a1984, a1985, a1986, a1987, a1988, a1989, a1990, a1991, a1992, a1993, a1994, a1995, a1996, a1997, a1998, a1999, a2000, a2001, a2002, a2003, a2004, a2005, a2006, a2007, a2008, a2009, a2010, a2011, a2012, a2013, a2014, a2015, a2016) 
values( '".$_POST["tema"]."', '".$_POST["pais"]."', '".$_POST["codind"]."', 0, 0, 0,
0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ".$_POST["valor"]." )";
   $resultado=mysql_query($datamerca,$link) or die ( mysql_error ());; 
   }
   }*/
   if ($_SESSION['rol'] != 'ADMIN') {
   header("Location: consultmarketpro.php");
   }else{
   header("Location: viewindicate.php");
   }
   mysql_close($link);
   
  // }
   
?>