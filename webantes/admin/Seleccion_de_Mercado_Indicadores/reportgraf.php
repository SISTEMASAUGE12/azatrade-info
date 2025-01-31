<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Mercado Internacional e Indicadores</title>

<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
<?
//include "conexion.php" ; //llamamos a la conexion, donde uds puede modificar la base de datos ,user y pass.
include ("conection/config.php");
//$cn =LibMySQL::getInstancia();
$codi=$_GET["cod"];
$codip=$_GET["data"];
$codindi=$_GET[""];

include ( "pChart/pData.class" );
include ( "pChart/pChart.class" );

//$rs = $cn ->consultar( "select count(edad) as cedad,edad from personm group by edad asc;" ); //la consulta a la base de datos pidiendo la cantidad de edades de una determinada edad
$rs = ("SELECT
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
merca_temp_pais2.cod_pai = 'PER' AND
merca_temp_indi2.codigo = '11' AND
merca_temp_pais2.codigo = '11' AND
merca_datamercado.cod_indicador = 'AG.LND.ARBL.HA'
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
merca_datamercado.a2016
");

$nom_indicador = array (); //creamos el array
$a2014 = array ();
foreach ( $rs as $datos ){
$edad []= $datos [ 'nom_indicador' ]. " de edad" ; //asignamos a los arrays creados
$cedad []= $datos [ 'a2014' ];
}

$DataSet = new pData;

$DataSet ->AddPoint( $edad , "Edad" ); //el texto
$DataSet ->AddPoint( $cedad , "Porcentajes" ); //Extrayendo Porcentajes(la libreria se encarga de extraerlos , tan solo es necesario colocar cantidades.)
$DataSet ->AddAllSeries();
$DataSet ->SetAbsciseLabelSerie( "Edad" ); //no olvidar que aqui van los textos(nombres de los campos)
 // el codigo continua, pero no es necesario modificarla.
 //
$Test ->Render( "ReporteIndi1.png" ); //en la ultima parte se ve el nombre de la imagen que deseamos que se cree.
?>
<br>
<input name="resetea" class="btn btn-primary" onclick="javascript:history.back()" type="button" value="Regresa Atras" />
</body>
</html>