<?php
session_start();
include ("conection/config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="azatrade,azatradewww, azatrade inteligencia comercial">
<meta name="author" content="azasof, Azatrade, azatrade, azatradewww">
<meta name="keywords" content="azatradewww, azatrade">
<title>Azatrade ..::WWW::..</title>
<link rel="shortcut icon" href="../img/azatrade.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="boostrap/css/bootstrap.css">
<link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<script src="boostrap/js/jquery.min.js"></script>
<script src="boostrap/js/bootstrap.min.js"></script>
  
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>

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
				url:"listaidioma.php"
			}).done(function(data,textStatus,jqXHR){

				var lista = data.lista;

				$("#miTabla").html("");

				$.each(lista, function(ind, elem){

					$("<tr>"+
						"<td>"+elem.id+"</td>"+
						"<td>"+elem.idioma+"</td>"+
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
				url:"listaidioma.php"
			}).done(function(data,textStatus,jqXHR){
				var total = data.total;

				creaPaginador(total);


			}).fail(function(jqXHR,textStatus,textError){
				alert("Error al realizar la peticion cuantos".textError);

			});

		});
		</script>
</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<?php
include("menu.php");
?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <?php
	/*panel izquierdo*/
	include("lateral_izquierdo.php");
    ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Usted esta aqui: Inicio /  Lista de Idiomas.</h6>
              <!--<p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
              <button type="button" class="w3-btn w3-theme"><i class="fa fa-pencil"></i>  Post</button>-->
              
            </div>
          </div>
        </div>
      </div>
      



<div class="w3-container w3-card-2 w3-white w3-round w3-margin">
<br>
        <center>
        
        <p><h3>Lista de Idiomas Registrados</h3></p>
        </center><br>
        <!--<hr class="w3-clear">-->
<div class='table-responsive'>
<table class="table table-striped table-hover">
					<thead>
                    <tr>
						<th><a href="addidio.php"><button class="btn btn-success"><i class="fa fa-edit"></i> Nuevo</button></a></th>
					  </tr>
					  <tr>
						<th>Codigo</th>
						<th>Idiomas</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
						<!--<th>Producto</th> -->
						<!--<th>Apellido Materno</th> -->
					  </tr>
					</thead>
					<tbody id="miTabla">

					</tbody>
				</table>
</div>
				<div class="col-md-12 text-center">
					<ul class="pagination" id="paginador"></ul>
				</div>
                


      </div>
		  
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <?php
	/*panel derecho*/
	include("lateral_derecho.php");
      ?>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<?php
include("modal_acceder.php");
?>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <?php
  include("footer.php");
  ?>
</footer>

 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>

