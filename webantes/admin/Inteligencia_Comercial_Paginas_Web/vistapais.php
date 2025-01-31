<?
include ("conection/config.php");
include ("menu.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Azatrade - Info Paginas</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">	
		<script src="jquery/jquery-1.11.3.js"></script>	
		<script src="bootstrap/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript">

		var paginador;
		var totalPaginas
		var itemsPorPagina = 8;
		var numerosPorPagina = 4;

		function creaPaginador(totalItems)
		{
			paginador = $(".pagination");

			totalPaginas = Math.ceil(totalItems/itemsPorPagina);

			$('<li><a href="#" class="first_link"><</a></li>').appendTo(paginador);
			$('<li><a href="#" class="prev_link">«</a></li>').appendTo(paginador);

			var pag = 0;
			while(totalPaginas > pag)
			{
				$('<li><a href="#" class="page_link">'+(pag+1)+'</a></li>').appendTo(paginador);
				pag++;
			}


			if(numerosPorPagina > 1)
			{
				$(".page_link").hide();
				$(".page_link").slice(0,numerosPorPagina).show();
			}

			$('<li><a href="#" class="next_link">»</a></li>').appendTo(paginador);
			$('<li><a href="#" class="last_link">></a></li>').appendTo(paginador);

			paginador.find(".page_link:first").addClass("active");
			paginador.find(".page_link:first").parents("li").addClass("active");

			paginador.find(".prev_link").hide();

			paginador.find("li .page_link").click(function()
			{
				var irpagina =$(this).html().valueOf()-1;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .first_link").click(function()
			{
				var irpagina =0;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .prev_link").click(function()
			{
				var irpagina =parseInt(paginador.data("pag")) -1;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .next_link").click(function()
			{
				var irpagina =parseInt(paginador.data("pag")) +1;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .last_link").click(function()
			{
				var irpagina =totalPaginas -1;
				cargaPagina(irpagina);
				return false;
			});

			cargaPagina(0);




		}

		function cargaPagina(pagina)
		{
			var desde = pagina * itemsPorPagina;

			$.ajax({
				data:{"param1":"dame","limit":itemsPorPagina,"offset":desde},
				type:"GET",
				dataType:"json",
				url:"listapais.php"
			}).done(function(data,textStatus,jqXHR){

				var lista = data.lista;

				$("#miTabla").html("");

				$.each(lista, function(ind, elem){

					$("<tr>"+
						"<td>"+elem.id+"</td>"+
						"<td>"+elem.pais+"</td>"+
						/*"<td>"+elem.producto+"</td>"+*/
						/*"<td>"+elem.eliminado+"</td>"+*/
						"<td>"+elem.editar+"</td>"+
						"<td>"+elem.eliminar+"</td>"+
						"</tr>").appendTo($("#miTabla"));


				});			


			}).fail(function(jqXHR,textStatus,textError){
				alert("Error al realizar la peticion dame".textError);

			});

			if(pagina >= 1)
			{
				paginador.find(".prev_link").show();

			}
			else
			{
				paginador.find(".prev_link").hide();
			}


			if(pagina <(totalPaginas- numerosPorPagina))
			{
				paginador.find(".next_link").show();
			}else
			{
				paginador.find(".next_link").hide();
			}

			paginador.data("pag",pagina);

			if(numerosPorPagina>1)
			{
				$(".page_link").hide();
				if(pagina < (totalPaginas- numerosPorPagina))
				{
					$(".page_link").slice(pagina,numerosPorPagina + pagina).show();
				}
				else{
					if(totalPaginas > numerosPorPagina)
						$(".page_link").slice(totalPaginas- numerosPorPagina).show();
					else
						$(".page_link").slice(0).show();

				}
			}

			paginador.children().removeClass("active");
			paginador.children().eq(pagina+2).addClass("active");


		}


		$(function()
		{

			$.ajax({

				data:{"param1":"cuantos"},
				type:"GET",
				dataType:"json",
				url:"listapais.php"
			}).done(function(data,textStatus,jqXHR){
				var total = data.total;

				creaPaginador(total);


			}).fail(function(jqXHR,textStatus,textError){
				alert("Error al realizar la peticion cuantos".textError);

			});



		});



		</script>
	</head>
	<body>
    <br><p>
		<div class="panel panel-primary"> 
			<div class="panel-heading"><center>Listado de Paises</center></div>
			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
                    <tr>
						<th><a href="addpais.php"><img src="img/nuevo.png"></a></th>
					  </tr>
					  <tr>
						<th>Codigo</th>
						<th>Pais</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
						<!--<th>Producto</th> -->
						<!--<th>Apellido Materno</th> -->
					  </tr>
					</thead>
					<tbody id="miTabla">

					</tbody>
				</table>

				<div class="col-md-12 text-center">
					<ul class="pagination" id="paginador"></ul>
				</div>

			</div>
			<!--<div class="panel-footer">pie del panel</div> -->
		</div>
	</body>
</html>