<?php
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";
?>
<!DOCTYPE html>
<html>
	<title>Azatrade - Gestion de Partidas</title>
	<head>
		<meta name="description" content="Datatable custom column search by jquery datepicker with server side data (php, mysql. jquery)" />
		<meta name="keywords" content="datatable, datatable serverside, datatable serach by datepicker, gridviw datepicker, datepicker search" />
		<meta name="author" content="Arkaprava majumder" />
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" language="javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
			
				var dataTable =  $('#employee-grid').DataTable( {
				processing: true,
				serverSide: true,
				ajax: "tableparnoexcdata.php", // json datasource

				} );
				
				$("#employee-grid_filter").css("display","none");  // hiding global search box
				
				$('.employee-search-input').on( 'keyup click change', function () {   
					var i =$(this).attr('id');  // getting column index
					var v =$(this).val();  // getting search input value
					dataTable.columns(i).search(v).draw();
				} );
		
				 $( ".datepicker" ).datepicker({
				 	dateFormat: "yy-mm-dd",
					showOn: "button",
					showAnim: 'slideDown',
					showButtonPanel: true ,
					autoSize: true,
					buttonImage: "//jqueryui.com/resources/demos/datepicker/images/calendar.gif",
					buttonImageOnly: true,
					buttonText: "Select date",
					closeText: "Clear"
				});
				$(document).on("click", ".ui-datepicker-close", function(){
					$('.datepicker').val("");
					dataTable.columns(5).search("").draw();
				});
			} );

		</script>
		<style>
			div.container {
			    max-width: 980px;
			    margin: 0 auto;
			}
			div.header {
			    margin: 0 auto;
			    max-width:980px;
			}
			body {
			    background: #f7f7f7;
			    color: #333;
			}
			.employee-search-input {
			    width: 100%;
			}
			.datepicker {
				float:left;width:90%;
			}
		</style>
		
        <link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        
	</head>
	<body>
    
		<div class="header" align="center"><h3><? echo "$titulo"; ?></h3></div>
		<!-- <div class="container"> -->
		<!-- 	<table id="employee-grid"  class="display" cellspacing="0" width="100%"> -->
            <table id="employee-grid"  class="table table-striped table-hover " cellspacing="0" width="100%" style='font-size:80%'>
				<thead>
					<tr>
						<th>Partida</th>
						<th>Codexec</th>
						<th>Descripcion</th>
                        <th>Fecha Inicio</th>
                        <th>fecha Final</th>
                        
					</tr>
				</thead>
				<thead>
					<tr>
						<td><input type="text" id="0"  class="employee-search-input"></td>
						<td><input type="text" id="1" class="employee-search-input"></td>
                        <td><input type="text" id="2"  class="employee-search-input"></td>
						<td  valign="middle" width="80"><input type="text" id="3" class="employee-search-input datepicker" ></td>
                        <td  valign="middle" width="80"><input type="text" id="4" class="employee-search-input datepicker" ></td>
						
					</tr>
				</thead>
			</table>
		<!-- </div> -->
	</body>
</html>
<?php
include("pie.php");
?>