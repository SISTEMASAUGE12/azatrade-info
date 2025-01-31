$(function(){
	$('#btnbusruc').on('click', function (T){
		$('#alertmuestra').hide();
		$('#alertgriamuestra').hide();
      //$('#btnbusruc').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btnbusruc').val("Procesando envio espere...");//cambia texto de boton
      
      T.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('btnbusruc', $('#btnbusruc').prop('value'));
      var destino = "empresabusruc.php"; 
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alert").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alert').html(data); $('#btnbusruc').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	$('#btnbusrazon').on('click', function (T){ 
		$('#alertmuestra').hide();
		$('#alertgriamuestra').hide();
      //$('#btnbusrazon').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btnbusrazon').val("Procesando envio espere...");//cambia texto de boton
      
      T.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('btnbusrazon', $('#btnbusrazon').prop('value'));
      var destino = "empresabusrazon.php"; 
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alert").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Consultando Lista de EMPRESAS, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alert').html(data); $('#btnbusrazon').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
    $('#buscarazon').on('click', function (T){ 
		
		$('#alertmuestra').show();// muestro DIV
		$('#gria').show();// muestro DIV
		$('html, body').animate({
           'scrollTop':   $('#alertmuestra').offset().top
         }, 1000); //ancla hacia el DIV
		
		var dato2 = $("#razonsoci")[0].value.length;
      if(dato2 === 0){
        $("select#razonsoci").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione Razon Social",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
	

      $('#buscarazon').attr('disabled', 'disabled');//desabilita boton de envio
      $('#buscarazon').val("Procesando envio espere...");//cambia texto de boton
      
      T.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('depavalue', $('#depavalue').prop('value'));
      paqueteDeDatosRegi.append('razonsoci', $('#razonsoci').prop('value'));
      var destino = "empresabusca-btn.php"; 
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); Limpiar(); $('#buscarazon').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	$('#buscaruc').on('click', function (T){ 
		
		$('#alertmuestra').show();// muestro DIV
		$('#gria').show();// muestro DIV
		$('html, body').animate({
           'scrollTop':   $('#alertmuestra').offset().top
         }, 1000); //ancla hacia el DIV
		
		var dato2 = $("#busruc")[0].value.length;
      if(dato2 === 0){
        $("input#busruc").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingrese Numero de RUC",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
	

      $('#buscaruc').attr('disabled', 'disabled');//desabilita boton de envio
      $('#buscaruc').val("Procesando envio espere...");//cambia texto de boton
      
      T.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('depavalue', $('#depavalue').prop('value'));
      paqueteDeDatosRegi.append('busruc', $('#busruc').prop('value'));
      var destino = "empresabusca-btn.php"; 
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); Limpiardos(); $('#buscaruc').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	$('#btncnltaA').on('click', function (P){
		$('#gria').show();// muestro DIV
		$('#alertgriamuestra').show();// muestro DIV
		//$('#alertmuestra').contents().filter((_, el) => el.nodeType === 3).remove();//reset div
		 //$("#alertmuestra").load(location.href + " #alertmuestra");//reset div
		
      //$('#btncnltaA').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnltaA').val("Procesando envio espere...");//cambia texto de boton
      P.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('namempA', $('#namempA').prop('value'));
      paqueteDeDatosRegi.append('codempA', $('#codempA').prop('value'));
	  paqueteDeDatosRegi.append('codubi', $('#codubi').prop('value'));
	  paqueteDeDatosRegi.append('namedepa', $('#namedepa').prop('value'));
      var destino = "empresasql/indicaanual.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertgriamuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertgriamuestra').html(data); desplaza(); $('#btncnltaA').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
$('#btncnslmen').on('click', function (P){
	$('.bs-example-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
	    $('#alertgriamuestra').show();// muestro DIV
	
      //$('#btncnltaA').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnslmen').val("Procesando envio espere...");//cambia texto de boton
      P.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('namempA1', $('#namempA1').prop('value'));
      paqueteDeDatosRegi.append('codempA1', $('#codempA1').prop('value'));
	  paqueteDeDatosRegi.append('codubi1', $('#codubi1').prop('value'));
	  paqueteDeDatosRegi.append('namedepa1', $('#namedepa1').prop('value'));
	  paqueteDeDatosRegi.append('year', $('#year').prop('value'));
      var destino = "empresasql/indicadormensual.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertgriamuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertgriamuestra').html(data); desplaza(); $('#btncnslmen').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//estacionalidad
	$('#btncnslesta').on('click', function (M){
	$('.bs-examplesta-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('#alertgriamuestra').show();// muestro DIV
		
		var dato1 = $("#unavariaestaci")[0].value.length;
      if(dato1 === 0){
        $("select#unavariaestaci").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione un Indicador",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
      //$('#btncnslesta').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnslesta').val("Procesando envio espere...");//cambia texto de boton
      M.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('namempA2', $('#namempA2').prop('value'));
      paqueteDeDatosRegi.append('codempA2', $('#codempA2').prop('value'));
	  paqueteDeDatosRegi.append('codubi2', $('#codubi2').prop('value'));
	  paqueteDeDatosRegi.append('namedepa2', $('#namedepa2').prop('value'));
	  paqueteDeDatosRegi.append('unavariaestaci', $('#unavariaestaci').prop('value'));
      var destino = "empresasql/estacionalidad.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertgriamuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertgriamuestra').html(data); desplaza(); $('#btncnslesta').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//partida
	$('#btncnslmerca').on('click', function (M){
	$('.bs-examplparti-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('#alertgriamuestra').show();// muestro DIV
		
		var dato1 = $("#unavaria")[0].value.length;
      if(dato1 === 0){
        $("select#unavaria").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione un Indicador",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
      //$('#btncnslmerca').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnslmerca').val("Procesando envio espere...");//cambia texto de boton
      M.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('namempA3', $('#namempA3').prop('value'));
      paqueteDeDatosRegi.append('codempA3', $('#codempA3').prop('value'));
	  paqueteDeDatosRegi.append('codubi3', $('#codubi3').prop('value'));
	  paqueteDeDatosRegi.append('namedepa3', $('#namedepa3').prop('value'));
	  paqueteDeDatosRegi.append('dosvaria', $('#dosvaria').prop('value'));
	  paqueteDeDatosRegi.append('unavaria', $('#unavaria').prop('value'));
      var destino = "empresasql/partidas.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertgriamuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertgriamuestra').html(data); desplaza(); $('#btncnslmerca').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//departamentos
	$('#btncnsldepa').on('click', function (M){
	$('.bs-exampldepa-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('#alertgriamuestra').show();// muestro DIV
		
		var dato1 = $("#unavaria6")[0].value.length;
      if(dato1 === 0){
        $("select#unavaria6").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione un Indicador",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
      //$('#btncnsldepa').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnsldepa').val("Procesando envio espere...");//cambia texto de boton
      M.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('namempA6', $('#namempA6').prop('value'));
      paqueteDeDatosRegi.append('codempA6', $('#codempA6').prop('value'));
	  paqueteDeDatosRegi.append('codubi6', $('#codubi6').prop('value'));
	  paqueteDeDatosRegi.append('namedepa6', $('#namedepa6').prop('value'));
	  paqueteDeDatosRegi.append('dosvaria6', $('#dosvaria6').prop('value'));
	  paqueteDeDatosRegi.append('unavaria6', $('#unavaria6').prop('value'));
      var destino = "empresasql/partidas.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertgriamuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertgriamuestra').html(data); desplaza(); $('#btncnsldepa').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//pais
	$('#btncnslpais').on('click', function (M){
	$('.bs-examplpais-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('#alertgriamuestra').show();// muestro DIV
		
		var dato1 = $("#unavaria5")[0].value.length;
      if(dato1 === 0){
        $("select#unavaria5").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione un Indicador",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
      //$('#btncnslpais').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnslpais').val("Procesando envio espere...");//cambia texto de boton
      M.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('namempA5', $('#namempA5').prop('value'));
      paqueteDeDatosRegi.append('codempA5', $('#codempA5').prop('value'));
	  paqueteDeDatosRegi.append('codubi5', $('#codubi5').prop('value'));
	  paqueteDeDatosRegi.append('namedepa5', $('#namedepa5').prop('value'));
	  paqueteDeDatosRegi.append('dosvaria5', $('#dosvaria5').prop('value'));
	  paqueteDeDatosRegi.append('unavaria5', $('#unavaria5').prop('value'));
      var destino = "empresasql/partidas.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertgriamuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertgriamuestra').html(data); desplaza(); $('#btncnslpais').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//agente aduanas
	$('#btncnslageadu').on('click', function (M){
	$('.bs-examplageadu-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('#alertgriamuestra').show();// muestro DIV
		
		var dato1 = $("#unavaria7")[0].value.length;
      if(dato1 === 0){
        $("select#unavaria7").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione un Indicador",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
      //$('#btncnslageadu').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnslageadu').val("Procesando envio espere...");//cambia texto de boton
      M.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('namempA7', $('#namempA7').prop('value'));
      paqueteDeDatosRegi.append('codempA7', $('#codempA7').prop('value'));
	  paqueteDeDatosRegi.append('codubi7', $('#codubi7').prop('value'));
	  paqueteDeDatosRegi.append('namedepa7', $('#namedepa7').prop('value'));
	  paqueteDeDatosRegi.append('dosvaria7', $('#dosvaria7').prop('value'));
	  paqueteDeDatosRegi.append('unavaria7', $('#unavaria7').prop('value'));
      var destino = "empresasql/partidas.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertgriamuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertgriamuestra').html(data); desplaza(); $('#btncnslageadu').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//aduanas
	$('#btncnsladua').on('click', function (M){
	$('.bs-exampladua-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('#alertgriamuestra').show();// muestro DIV
		
		var dato1 = $("#unavaria8")[0].value.length;
      if(dato1 === 0){
        $("select#unavaria8").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione un Indicador",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
      //$('#btncnsladua').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnsladua').val("Procesando envio espere...");//cambia texto de boton
      M.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('namempA8', $('#namempA8').prop('value'));
      paqueteDeDatosRegi.append('codempA8', $('#codempA8').prop('value'));
	  paqueteDeDatosRegi.append('codubi8', $('#codubi8').prop('value'));
	  paqueteDeDatosRegi.append('namedepa8', $('#namedepa8').prop('value'));
	  paqueteDeDatosRegi.append('dosvaria8', $('#dosvaria8').prop('value'));
	  paqueteDeDatosRegi.append('unavaria8', $('#unavaria8').prop('value'));
      var destino = "empresasql/partidas.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertgriamuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertgriamuestra').html(data); desplaza(); $('#btncnsladua').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//puertos de ingreso
	$('#btncnslevamer').on('click', function (M){
	$('.bs-examplepueing-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('#alertgriamuestra').show();// muestro DIV
		
		var dato1 = $("#unavariaevamer")[0].value.length;
      if(dato1 === 0){
        $("select#unavariaevamer").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione un Indicador",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
      //$('#btncnslevamer').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnslevamer').val("Procesando envio espere...");//cambia texto de boton
      M.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('namempA4', $('#namempA4').prop('value'));
      paqueteDeDatosRegi.append('codempA4', $('#codempA4').prop('value'));
	  paqueteDeDatosRegi.append('codubi4', $('#codubi4').prop('value'));
	  paqueteDeDatosRegi.append('namedepa4', $('#namedepa4').prop('value'));
	  paqueteDeDatosRegi.append('dosvaria4', $('#dosvaria4').prop('value'));
	  paqueteDeDatosRegi.append('unavariaevamer', $('#unavariaevamer').prop('value'));
      var destino = "empresasql/partidas.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertgriamuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertgriamuestra').html(data); desplaza(); $('#btncnslevamer').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	

  });
  function Limpiar(){
   /* $("#depavalue").val(""); $("#mercado").val("");*/ $('#buscarazon').prop('disabled', false); /*$('#gria').hide();*/
	}
function Limpiardos(){
   /* $("#depavalue").val(""); $("#mercado").val("");*/ $('#buscaruc').prop('disabled', false); /*$('#gria').hide();*/
	}

function desplaza(){
	$('html, body').animate({
           'scrollTop':   $('#alertgriamuestra').offset().top
         }, 1000); //ancla hacia el DIV
}

//mostrar y ocultar elementos con ajax
/*$(document).ready(function(){
		$("#mostrar").on( "click", function() {
			$('#target').show(); //muestro mediante id
			$('.target').show(); //muestro mediante clase
		 });
		$("#ocultar").on( "click", function() {
			$('#target').hide(); //oculto mediante id
			$('.target').hide(); //muestro mediante clase
		});
	});*/