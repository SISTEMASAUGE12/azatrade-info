<?php
//session_start();
class sistema{
		public function conexion(){
			/*$host        = 'localhost';
			$usuario    = 'root';
			$password = 'root';
			$dataBase  = 'colegio';
			
			$conexion = mysql_connect($host, $usuario, $password);
			$seleccion = mysql_select_db($dataBase, $conexion);*/
			
			include ("conection/config.php");
            //include ("menuA.php");
		
		}
		function mostrarAsistencias(){
			//$sql = mysql_query("SELECT * FROM asistencias");
			$sql = mysql_query("SELECT
t.id,
ind.id,
t.tema,
t.descripcion,
ind.cod_indicador,
ind.idtema,
ind.id_produc,
ind.nom_indicador,
ind.fuente_nota,
ind.fuente_org,
ind.valor,
ind.valor_mayor_puntaje,
ind.origen,
ind.usuario,
ind.fecha_reg
FROM
merca_indicadores AS ind
Inner Join merca_tema AS t ON ind.idtema = t.id
WHERE
ind.origen =  'nuevoindpro'
ORDER BY
t.tema ASC,
ind.nom_indicador ASC
");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					//$estudiantes = mysql_num_rows(mysql_query("SELECT * FROM detalle_asistencias WHERE cod_asistencia = '".$mostrar['cod_asistencia']."' "));
					
					$item = $item+1;
					echo '<tr>
								<!-- <td>'.$item.'</td> -->
								<td align=center>'.$mostrar['id'].'</td>
								<td>'.$mostrar['tema'].'</td>
								<td>'.$mostrar['nom_indicador'].'</td>
								<td>'.$mostrar['fuente_nota'].'</td>
								<td>'.$mostrar['fuente_org'].'</td>
							
							</tr>';
				}
			}else{
				echo '<tr><td colspan="5">No se encontraron registros...</td></tr>';
			}
		}
}