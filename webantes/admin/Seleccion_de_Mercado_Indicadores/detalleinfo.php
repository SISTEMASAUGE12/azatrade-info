<?
include ("conection/config.php");

$codi=$_GET["cod"];
$codip=$_GET["data"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Azatrade - Mercado Internacional e Indicadores</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<br>
<?

//seleccionamos pais
	$sqlpa="SELECT mt.id_inf, tp.cod_pai, p.pais FROM merca_temp_info AS mt INNER JOIN merca_temp_pais2 AS tp ON mt.id_inf = tp.codigo INNER JOIN merca_pais AS p ON tp.cod_pai = p.cod_pais WHERE mt.id_inf = '$codi' AND tp.cod_pai = '$codip'";
	$xrsa = mysql_query($sqlpa);
if (mysql_num_rows($xrsa) > 0){
	while($rowsa = mysql_fetch_array($xrsa)){
		$pais=$rowsa["pais"];
		}
	}
//fin pais seleccionado
echo"<center><b><em>$pais</em></b></center>";


$sql="SELECT
merca_datamercado.cod_pais,
merca_datamercado.cod_indicador,
merca_temp_pais2.cod_pai,
merca_indicadores.nom_indicador,
merca_datamercado.a1960,
merca_datamercado.a1961,
merca_datamercado.a1962,
merca_datamercado.a1963,
merca_datamercado.a1964,
merca_datamercado.a1965,
merca_datamercado.a1966,
merca_datamercado.a1967,
merca_datamercado.a1968,
merca_datamercado.a1969,
merca_datamercado.a1970,
merca_datamercado.a1971,
merca_datamercado.a1972,
merca_datamercado.a1973,
merca_datamercado.a1974,
merca_datamercado.a1975,
merca_datamercado.a1976,
merca_datamercado.a1977,
merca_datamercado.a1978,
merca_datamercado.a1979,
merca_datamercado.a1980,
merca_datamercado.a1981,
merca_datamercado.a1982,
merca_datamercado.a1983,
merca_datamercado.a1984,
merca_datamercado.a1985,
merca_datamercado.a1986,
merca_datamercado.a1987,
merca_datamercado.a1988,
merca_datamercado.a1989,
merca_datamercado.a1990,
merca_datamercado.a1991,
merca_datamercado.a1992,
merca_datamercado.a1993,
merca_datamercado.a1994,
merca_datamercado.a1995,
merca_datamercado.a1996,
merca_datamercado.a1997,
merca_datamercado.a1998,
merca_datamercado.a1999,
merca_datamercado.a2000,
merca_datamercado.a2001,
merca_datamercado.a2002,
merca_datamercado.a2003,
merca_datamercado.a2004,
merca_datamercado.a2005,
merca_datamercado.a2006,
merca_datamercado.a2007,
merca_datamercado.a2008,
merca_datamercado.a2009,
merca_datamercado.a2010,
merca_datamercado.a2011,
merca_datamercado.a2012,
merca_datamercado.a2013,
merca_datamercado.a2014,
merca_datamercado.a2015,
merca_datamercado.a2016
FROM
merca_datamercado
INNER JOIN merca_temp_indi2 ON merca_datamercado.cod_indicador = merca_temp_indi2.id_indi
INNER JOIN merca_temp_pais2 ON merca_datamercado.cod_pais = merca_temp_pais2.cod_pai
INNER JOIN merca_indicadores ON merca_temp_indi2.id_indi = merca_indicadores.cod_indicador
WHERE
merca_temp_pais2.cod_pai = '$codip' AND
merca_temp_indi2.codigo = '$codi' AND
merca_temp_pais2.codigo = '$codi'
GROUP BY
merca_datamercado.cod_pais,
merca_datamercado.cod_indicador,
merca_temp_pais2.cod_pai,
merca_indicadores.nom_indicador,
merca_datamercado.a1960,
merca_datamercado.a1961,
merca_datamercado.a1962,
merca_datamercado.a1963,
merca_datamercado.a1964,
merca_datamercado.a1965,
merca_datamercado.a1966,
merca_datamercado.a1967,
merca_datamercado.a1968,
merca_datamercado.a1969,
merca_datamercado.a1970,
merca_datamercado.a1971,
merca_datamercado.a1972,
merca_datamercado.a1973,
merca_datamercado.a1974,
merca_datamercado.a1975,
merca_datamercado.a1976,
merca_datamercado.a1977,
merca_datamercado.a1978,
merca_datamercado.a1979,
merca_datamercado.a1980,
merca_datamercado.a1981,
merca_datamercado.a1982,
merca_datamercado.a1983,
merca_datamercado.a1984,
merca_datamercado.a1985,
merca_datamercado.a1986,
merca_datamercado.a1987,
merca_datamercado.a1988,
merca_datamercado.a1989,
merca_datamercado.a1990,
merca_datamercado.a1991,
merca_datamercado.a1992,
merca_datamercado.a1993,
merca_datamercado.a1994,
merca_datamercado.a1995,
merca_datamercado.a1996,
merca_datamercado.a1997,
merca_datamercado.a1998,
merca_datamercado.a1999,
merca_datamercado.a2000,
merca_datamercado.a2001,
merca_datamercado.a2002,
merca_datamercado.a2003,
merca_datamercado.a2004,
merca_datamercado.a2005,
merca_datamercado.a2006,
merca_datamercado.a2007,
merca_datamercado.a2008,
merca_datamercado.a2009,
merca_datamercado.a2010,
merca_datamercado.a2011,
merca_datamercado.a2012,
merca_datamercado.a2013,
merca_datamercado.a2014,
merca_datamercado.a2015,
merca_datamercado.a2016 ";
$rs = mysql_query($sql);
if (mysql_num_rows($rs) > 0){
	
	//selecconamos los años seleccionados
	$xsql="SELECT ti.id_inf,ty.codigo,ty.a1,ty.a2,ty.a3,ty.a4,ty.a5,ty.a6,ty.a7,ty.a8,ty.a9,ty.a10 FROM merca_temp_info AS ti INNER JOIN merca_temp_yearfila AS ty ON ti.id_inf = ty.codigo WHERE ti.id_inf = '$codi' ";
	$xrs = mysql_query($xsql);
if (mysql_num_rows($xrs) > 0){
	while($xrow = mysql_fetch_array($xrs)){
		$y1=$xrow["a1"];
		$y2=$xrow["a2"];
		$y3=$xrow["a3"];
		$y4=$xrow["a4"];
		$y5=$xrow["a5"];
		$y6=$xrow["a6"];
		$y7=$xrow["a7"];
		$y8=$xrow["a8"];
		$y9=$xrow["a9"];
		$y10=$xrow["a10"];
	}
	}
	//fin años seleccionados
	
	echo"<table class='table table-hover'>";
	echo"<tr>";
	echo "<td><b>Indicador</b></td>";
	echo "<td><b>$y1</b></td>";
	if($y2!=''){
		echo "<td><b>$y2</b></td>";
		}
	if($y3!=''){
		echo "<td><b>$y3</b></td>";
		}
	if($y4!=''){
		echo "<td><b>$y4</b></td>";
		}
	if($y5!=''){
		echo "<td><b>$y5</b></td>";
		}
	if($y6!=''){
		echo "<td><b>$y6</b></td>";
		}
	if($y7!=''){
		echo "<td<b>>$y7</b></td>";
		}
	if($y8!=''){
		echo "<td><b>$y8</b></td>";
		}
	if($y9!=''){
		echo "<td><b>$y9</b></td>";
		}
	if($y10!=''){
		echo "<td><b>$y10</b></td>";
		}
	
	echo"</tr>";
	while($row = mysql_fetch_array($rs)){
		$nomi=$row["nom_indicador"];
		$codnomi=$row["cod_indicador"];
		$idcod=$row["nom_indicador"];
		
		$a1=$row["a1960"];
		$a2=$row["a1961"];
		$a3=$row["a1962"];
		$a4=$row["a1963"];
		$a5=$row["a1964"];
		$a6=$row["a1965"];
		$a7=$row["a1966"];
		$a8=$row["a1967"];
		$a9=$row["a1968"];
		$a10=$row["a1969"];
		$a11=$row["a1970"];
		$a12=$row["a1971"];
		$a13=$row["a1972"];
		$a14=$row["a1973"];
		$a15=$row["a1974"];
		$a16=$row["a1975"];
		$a17=$row["a1976"];
		$a18=$row["a1977"];
		$a19=$row["a1978"];
		$a20=$row["a1979"];
		$a21=$row["a1980"];
		$a22=$row["a1981"];
		$a23=$row["a1982"];
		$a24=$row["a1983"];
		$a25=$row["a1984"];
		$a26=$row["a1985"];
		$a27=$row["a1986"];
		$a28=$row["a1987"];
		$a29=$row["a1988"];
		$a30=$row["a1989"];
		$a31=$row["a1990"];
		$a32=$row["a1991"];
		$a33=$row["a1992"];
		$a34=$row["a1993"];
		$a35=$row["a1994"];
		$a36=$row["a1995"];
		$a37=$row["a1996"];
		$a38=$row["a1997"];
		$a39=$row["a1998"];
		$a40=$row["a1999"];
		$a41=$row["a2000"];
		$a42=$row["a2001"];
		$a43=$row["a2002"];
		$a44=$row["a2003"];
		$a45=$row["a2004"];
		$a46=$row["a2005"];
		$a47=$row["a2006"];
		$a48=$row["a2007"];
		$a49=$row["a2008"];
		$a50=$row["a2009"];
		$a51=$row["a2010"];
		$a52=$row["a2011"];
		$a53=$row["a2012"];
		$a54=$row["a2013"];
		$a55=$row["a2014"];
		
		//reportgraf.php
		echo"<tr>";
		echo"<td><a href='#'>$nomi</a></td>";
		//año 1960
		if($y1=='1960' or $y2=='1960' or $y3=='1960' or $y4=='1960' or $y5=='1960' or $y6=='1960' or $y7=='1960' or $y8=='1960' or $y9=='1960' or $y10=='1960'){
			echo"<td>$a1</td>";
			}
		//año 1961
		if($y1=='1961' or $y2=='1961' or $y3=='1961' or $y4=='1961' or $y5=='1961' or $y6=='1961' or $y7=='1961' or $y8=='1961' or $y9=='1961' or $y10=='1961'){
			echo"<td>$a2</td>";
			}
			
		//año 1962
		if($y1=='1962' or $y2=='1962' or $y3=='1962' or $y4=='1962' or $y5=='1962' or $y6=='1962' or $y7=='1962' or $y8=='1962' or $y9=='1962' or $y10=='1962'){
			echo"<td>$a3</td>";
			}
			
		//año 1963
		if($y1=='1963' or $y2=='1963' or $y3=='1963' or $y4=='1963' or $y5=='1963' or $y6=='1963' or $y7=='1963' or $y8=='1963' or $y9=='1963' or $y10=='1963'){
			echo"<td>$a4</td>";
			}
			
		//año 1964
		if($y1=='1964' or $y2=='1964' or $y3=='1964' or $y4=='1964' or $y5=='1964' or $y6=='1964' or $y7=='1964' or $y8=='1964' or $y9=='1964' or $y10=='1964'){
			echo"<td>$a5</td>";
			}
			
		//año 1965
		if($y1=='1965' or $y2=='1965' or $y3=='1965' or $y4=='1965' or $y5=='1965' or $y6=='1965' or $y7=='1965' or $y8=='1965' or $y9=='1965' or $y10=='1965'){
			echo"<td>$a6</td>";
			}
			
	//año 1966
		if($y1=='1966' or $y2=='1966' or $y3=='1966' or $y4=='1966' or $y5=='1966' or $y6=='1966' or $y7=='1966' or $y8=='1966' or $y9=='1966' or $y10=='1966'){
			echo"<td>$a7</td>";
			}
			
	//año 1967
		if($y1=='1967' or $y2=='1967' or $y3=='1967' or $y4=='1967' or $y5=='1967' or $y6=='1967' or $y7=='1967' or $y8=='1967' or $y9=='1967' or $y10=='1967'){
			echo"<td>$a8</td>";
			}
			
		//año 1968
		if($y1=='1968' or $y2=='1968' or $y3=='1968' or $y4=='1968' or $y5=='1968' or $y6=='1968' or $y7=='1968' or $y8=='1968' or $y9=='1968' or $y10=='1968'){
			echo"<td>$a9</td>";
			}
			
		//año 1969
		if($y1=='1969' or $y2=='1969' or $y3=='1969' or $y4=='1969' or $y5=='1969' or $y6=='1969' or $y7=='1969' or $y8=='1969' or $y9=='1969' or $y10=='1969'){
			echo"<td>$a10</td>";
			}
			
		//año 1970
		if($y1=='1970' or $y2=='1970' or $y3=='1970' or $y4=='1970' or $y5=='1970' or $y6=='1970' or $y7=='1970' or $y8=='1970' or $y9=='1970' or $y10=='1970'){
			echo"<td>$a11</td>";
			}
			
		//año 1971
		if($y1=='1971' or $y2=='1971' or $y3=='1971' or $y4=='1971' or $y5=='1971' or $y6=='1971' or $y7=='1971' or $y8=='1971' or $y9=='1971' or $y10=='1971'){
			echo"<td>$a12</td>";
			}
			
		//año 1972
		if($y1=='1972' or $y2=='1972' or $y3=='1972' or $y4=='1972' or $y5=='1972' or $y6=='1972' or $y7=='1972' or $y8=='1972' or $y9=='1972' or $y10=='1972'){
			echo"<td>$a13</td>";
			}
			
		//año 1973
		if($y1=='1973' or $y2=='1973' or $y3=='1973' or $y4=='1973' or $y5=='1973' or $y6=='1973' or $y7=='1973' or $y8=='1973' or $y9=='1973' or $y10=='1973'){
			echo"<td>$a14</td>";
			}
			
		//año 1974
		if($y1=='1974' or $y2=='1974' or $y3=='1974' or $y4=='1974' or $y5=='1974' or $y6=='1974' or $y7=='1974' or $y8=='1974' or $y9=='1974' or $y10=='1974'){
			echo"<td>$a15</td>";
			}
			
		//año 1975
		if($y1=='1975' or $y2=='1975' or $y3=='1975' or $y4=='1975' or $y5=='1975' or $y6=='1975' or $y7=='1975' or $y8=='1975' or $y9=='1975' or $y10=='1975'){
			echo"<td>$a16</td>";
			}
			
		//año 1976
		if($y1=='1976' or $y2=='1976' or $y3=='1976' or $y4=='1976' or $y5=='1976' or $y6=='1976' or $y7=='1976' or $y8=='1976' or $y9=='1976' or $y10=='1976'){
			echo"<td>$a17</td>";
			}
			
		//año 1977
		if($y1=='1977' or $y2=='1977' or $y3=='1977' or $y4=='1977' or $y5=='1977' or $y6=='1977' or $y7=='1977' or $y8=='1977' or $y9=='1977' or $y10=='1977'){
			echo"<td>$a18</td>";
			}
			
		//año 1978
		if($y1=='1978' or $y2=='1978' or $y3=='1978' or $y4=='1978' or $y5=='1978' or $y6=='1978' or $y7=='1978' or $y8=='1978' or $y9=='1978' or $y10=='1978'){
			echo"<td>$a19</td>";
			}
			
		//año 1979
		if($y1=='1979' or $y2=='1979' or $y3=='1979' or $y4=='1979' or $y5=='1979' or $y6=='1979' or $y7=='1979' or $y8=='1979' or $y9=='1979' or $y10=='1979'){
			echo"<td>$a20</td>";
			}
			
		//año 1980
		if($y1=='1980' or $y2=='1980' or $y3=='1980' or $y4=='1980' or $y5=='1980' or $y6=='1980' or $y7=='1980' or $y8=='1980' or $y9=='1980' or $y10=='1980'){
			echo"<td>$a21</td>";
			}
			
		//año 1981
		if($y1=='1981' or $y2=='1981' or $y3=='1981' or $y4=='1981' or $y5=='1981' or $y6=='1981' or $y7=='1981' or $y8=='1981' or $y9=='1981' or $y10=='1981'){
			echo"<td>$a22</td>";
			}
			
		//año 1982
		if($y1=='1982' or $y2=='1982' or $y3=='1982' or $y4=='1982' or $y5=='1982' or $y6=='1982' or $y7=='1982' or $y8=='1982' or $y9=='1982' or $y10=='1982'){
			echo"<td>$a23</td>";
			}
			
		//año 1983
		if($y1=='1983' or $y2=='1983' or $y3=='1983' or $y4=='1983' or $y5=='1983' or $y6=='1983' or $y7=='1983' or $y8=='1983' or $y9=='1983' or $y10=='1983'){
			echo"<td>$a24</td>";
			}
			
		//año 1984
		if($y1=='1984' or $y2=='1984' or $y3=='1984' or $y4=='1984' or $y5=='1984' or $y6=='1984' or $y7=='1984' or $y8=='1984' or $y9=='1984' or $y10=='1984'){
			echo"<td>$a25</td>";
			}
			
		//año 1985
		if($y1=='1985' or $y2=='1985' or $y3=='1985' or $y4=='1985' or $y5=='1985' or $y6=='1985' or $y7=='1985' or $y8=='1985' or $y9=='1985' or $y10=='1985'){
			echo"<td>$a26</td>";
			}
			
		//año 1986
		if($y1=='1986' or $y2=='1986' or $y3=='1986' or $y4=='1986' or $y5=='1986' or $y6=='1986' or $y7=='1986' or $y8=='1986' or $y9=='1986' or $y10=='1986'){
			echo"<td>$a27</td>";
			}
			
		//año 1987
		if($y1=='1987' or $y2=='1987' or $y3=='1987' or $y4=='1987' or $y5=='1987' or $y6=='1987' or $y7=='1987' or $y8=='1987' or $y9=='1987' or $y10=='1987'){
			echo"<td>$a28</td>";
			}
			
		//año 1988
		if($y1=='1988' or $y2=='1988' or $y3=='1988' or $y4=='1988' or $y5=='1988' or $y6=='1988' or $y7=='1988' or $y8=='1988' or $y9=='1988' or $y10=='1988'){
			echo"<td>$a29</td>";
			}
			
		//año 1989
		if($y1=='1989' or $y2=='1989' or $y3=='1989' or $y4=='1989' or $y5=='1989' or $y6=='1989' or $y7=='1989' or $y8=='1989' or $y9=='1989' or $y10=='1989'){
			echo"<td>$a30</td>";
			}
			
		//año 1990
		if($y1=='1990' or $y2=='1990' or $y3=='1990' or $y4=='1990' or $y5=='1990' or $y6=='1990' or $y7=='1990' or $y8=='1990' or $y9=='1990' or $y10=='1990'){
			echo"<td>$a31</td>";
			}
			
		//año 1991
		if($y1=='1991' or $y2=='1991' or $y3=='1991' or $y4=='1991' or $y5=='1991' or $y6=='1991' or $y7=='1991' or $y8=='1991' or $y9=='1991' or $y10=='1991'){
			echo"<td>$a32</td>";
			}
			
		//año 1992
		if($y1=='1992' or $y2=='1992' or $y3=='1992' or $y4=='1992' or $y5=='1992' or $y6=='1992' or $y7=='1992' or $y8=='1992' or $y9=='1992' or $y10=='1992'){
			echo"<td>$a33</td>";
			}
			
		//año 1993
		if($y1=='1993' or $y2=='1993' or $y3=='1993' or $y4=='1993' or $y5=='1993' or $y6=='1993' or $y7=='1993' or $y8=='1993' or $y9=='1993' or $y10=='1993'){
			echo"<td>$a34</td>";
			}
			
		//año 1994
		if($y1=='1994' or $y2=='1994' or $y3=='1994' or $y4=='1994' or $y5=='1994' or $y6=='1994' or $y7=='1994' or $y8=='1994' or $y9=='1994' or $y10=='1994'){
			echo"<td>$a35</td>";
			}
			
		//año 1995
		if($y1=='1995' or $y2=='1995' or $y3=='1995' or $y4=='1995' or $y5=='1995' or $y6=='1995' or $y7=='1995' or $y8=='1995' or $y9=='1995' or $y10=='1995'){
			echo"<td>$a36</td>";
			}
			
		//año 1996
		if($y1=='1996' or $y2=='1996' or $y3=='1996' or $y4=='1996' or $y5=='1996' or $y6=='1996' or $y7=='1996' or $y8=='1996' or $y9=='1996' or $y10=='1996'){
			echo"<td>$a37</td>";
			}
			
		//año 1997
		if($y1=='1997' or $y2=='1997' or $y3=='1997' or $y4=='1997' or $y5=='1997' or $y6=='1997' or $y7=='1997' or $y8=='1997' or $y9=='1997' or $y10=='1997'){
			echo"<td>$a38</td>";
			}
		
	//año 1998
		if($y1=='1998' or $y2=='1998' or $y3=='1998' or $y4=='1998' or $y5=='1998' or $y6=='1998' or $y7=='1998' or $y8=='1998' or $y9=='1998' or $y10=='1998'){
			echo"<td>$a39</td>";
			}
			
		//año 1999
		if($y1=='1999' or $y2=='1999' or $y3=='1999' or $y4=='1999' or $y5=='1999' or $y6=='1999' or $y7=='1999' or $y8=='1999' or $y9=='1999' or $y10=='1999'){
			echo"<td>$a40</td>";
			}
			
		//año 2000
		if($y1=='2000' or $y2=='2000' or $y3=='2000' or $y4=='2000' or $y5=='2000' or $y6=='2000' or $y7=='2000' or $y8=='2000' or $y9=='2000' or $y10=='2000'){
			echo"<td>$a41</td>";
			}
			
		//año 2001
		if($y1=='2001' or $y2=='2001' or $y3=='2001' or $y4=='2001' or $y5=='2001' or $y6=='2001' or $y7=='2001' or $y8=='2001' or $y9=='2001' or $y10=='2001'){
			echo"<td>$a42</td>";
			}
			
		//año 2002
		if($y1=='2002' or $y2=='2002' or $y3=='2002' or $y4=='2002' or $y5=='2002' or $y6=='2002' or $y7=='2002' or $y8=='2002' or $y9=='2002' or $y10=='2002'){
			echo"<td>$a43</td>";
			}
			
		//año 2003
		if($y1=='2003' or $y2=='2003' or $y3=='2003' or $y4=='2003' or $y5=='2003' or $y6=='2003' or $y7=='2003' or $y8=='2003' or $y9=='2003' or $y10=='2003'){
			echo"<td>$a44</td>";
			}
			
		//año 2004
		if($y1=='2004' or $y2=='2004' or $y3=='2004' or $y4=='2004' or $y5=='2004' or $y6=='2004' or $y7=='2004' or $y8=='2004' or $y9=='2004' or $y10=='2004'){
			echo"<td>$a45</td>";
			}
			
		//año 2005
		if($y1=='2005' or $y2=='2005' or $y3=='2005' or $y4=='2005' or $y5=='2005' or $y6=='2005' or $y7=='2005' or $y8=='2005' or $y9=='2005' or $y10=='2005'){
			echo"<td>$a46</td>";
			}
			
		//año 2006
		if($y1=='2006' or $y2=='2006' or $y3=='2006' or $y4=='2006' or $y5=='2006' or $y6=='2006' or $y7=='2006' or $y8=='2006' or $y9=='2006' or $y10=='2006'){
			echo"<td>$a47</td>";
			}
			
		//año 2007
		if($y1=='2007' or $y2=='2007' or $y3=='2007' or $y4=='2007' or $y5=='2007' or $y6=='2007' or $y7=='2007' or $y8=='2007' or $y9=='2007' or $y10=='2007'){
			echo"<td>$a48</td>";
			}
			
		//año 2008
		if($y1=='2008' or $y2=='2008' or $y3=='2008' or $y4=='2008' or $y5=='2008' or $y6=='2008' or $y7=='2008' or $y8=='2008' or $y9=='2008' or $y10=='2008'){
			echo"<td>$a49</td>";
			}
			
		//año 2009
		if($y1=='2009' or $y2=='2009' or $y3=='2009' or $y4=='2009' or $y5=='2009' or $y6=='2009' or $y7=='2009' or $y8=='2009' or $y9=='2009' or $y10=='2009'){
			echo"<td>$a50</td>";
			}	
		
		//año 2010
		if($y1=='2010' or $y2=='2010' or $y3=='2010' or $y4=='2010' or $y5=='2010' or $y6=='2010' or $y7=='2010' or $y8=='2010' or $y9=='2010' or $y10=='2010'){
			echo"<td>$a51</td>";
			}
		//año 2011
		if($y1=='2011' or $y2=='2011' or $y3=='2011' or $y4=='2011' or $y5=='2011' or $y6=='2011' or $y7=='2011' or $y8=='2011' or $y9=='2011' or $y10=='2011'){
			echo"<td>$a52</td>";
			}
		//año 2012
		if($y1=='2012' or $y2=='2012' or $y3=='2012' or $y4=='2012' or $y5=='2012' or $y6=='2012' or $y7=='2012' or $y8=='2012' or $y9=='2012' or $y10=='2012'){
			echo"<td>$a53</td>";
			}
		//año 2013
		if($y1=='2013' or $y2=='2013' or $y3=='2013' or $y4=='2013' or $y5=='2013' or $y6=='2013' or $y7=='2013' or $y8=='2013' or $y9=='2013' or $y10=='2013'){
			echo"<td>$a54</td>";
			}
		//año 2014
		if($y1=='2014' or $y2=='2014' or $y3=='2014' or $y4=='2014' or $y5=='2014' or $y6=='2014' or $y7=='2014' or $y8=='2014' or $y9=='2014' or $y10=='2014'){
			echo"<td>$a55</td>";
			}
			
		echo"</tr>";
		}
		echo"</table>";
		}
?>

</body>
</html>