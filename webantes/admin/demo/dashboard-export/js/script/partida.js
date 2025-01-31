$(function(){
    $('#busca').on('click', function (T){ 
		
		/*var dato1 = $("#selecyear")[0].value.length;
      if(dato1 === 0){
        $("input#selecyear").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione Año",
      type: 'error',
      padding: '2em'
    });
        return false;
      }*/
		
		var dato2 = $("#datopartida")[0].value.length;
      if(dato2 === 0){
        $("input#datopartida").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingrese Número de Partida",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
	

      $('#busca').attr('disabled', 'disabled');//desabilita boton de envio
      $('#busca').val("Procesando envio espere...");//cambia texto de boton
      
      T.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('depavalue', $('#depavalue').prop('value'));
      paqueteDeDatosRegi.append('datopartida', $('#datopartida').prop('value'));
      var destino = "partidabusca-btn.php"; 
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alert").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alert').html(data); Limpiar(); $('#busca').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	$('#btncnltaA').on('click', function (P){
		$('#gria').show();// muestro DIV
		//$('#alertmuestra').contents().filter((_, el) => el.nodeType === 3).remove();//reset div
		 //$("#alertmuestra").load(location.href + " #alertmuestra");//reset div
		$('html, body').animate({
           'scrollTop':   $('#alertmuestra').offset().top
         }, 1000); //ancla hacia el DIV
      //$('#btncnltaA').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnltaA').val("Procesando envio espere...");//cambia texto de boton
      P.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('partidaevoanua', $('#partidaevoanua').prop('value'));
      paqueteDeDatosRegi.append('codubi', $('#codubi').prop('value'));
	  paqueteDeDatosRegi.append('namedepa', $('#namedepa').prop('value'));
      var destino = "partidasql/partidaindicaanual.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnltaA').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
$('#btncnslmen').on('click', function (P){
	$('.bs-example-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		//$('#alertmuestra').contents().filter((_, el) => el.nodeType === 3).remove();//reset div
	    //$("#alertmuestra").load(location.href + " #alertmuestra");//reset div
		$('html, body').animate({
           'scrollTop':   $('#alertmuestra').offset().top
         }, 1000); //ancla hacia el DIV
      //$('#btncnltaA').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnslmen').val("Procesando envio espere...");//cambia texto de boton
      P.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('partidaindimen', $('#partidaindimen').prop('value'));
      paqueteDeDatosRegi.append('codubimen', $('#codubimen').prop('value'));
	  paqueteDeDatosRegi.append('namedepamen', $('#namedepamen').prop('value'));
	  paqueteDeDatosRegi.append('year', $('#year').prop('value'));
      var destino = "partidasql/partidaindicames.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnslmen').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//estacionalidad
	$('#btncnslesta').on('click', function (M){
	$('.bs-examplesta-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('html, body').animate({
           'scrollTop':   $('#alertmuestra').offset().top
         }, 1000); //ancla hacia el DIV
		
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
      paqueteDeDatosRegi.append('partidaesta', $('#partidaesta').prop('value'));
      paqueteDeDatosRegi.append('codubiesta', $('#codubiesta').prop('value'));
	  paqueteDeDatosRegi.append('namedepaesta', $('#namedepaesta').prop('value'));
	  paqueteDeDatosRegi.append('unavariaestaci', $('#unavariaestaci').prop('value'));
      var destino = "partidasql/partidaestacio.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnslesta').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//mercado
	$('#btncnslmerca').on('click', function (M){
	$('.bs-examplmerca-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('html, body').animate({
           'scrollTop':   $('#alertmuestra').offset().top
         }, 1000); //ancla hacia el DIV
		
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
      paqueteDeDatosRegi.append('partidamerca', $('#partidamerca').prop('value'));
      paqueteDeDatosRegi.append('codubimerca', $('#codubimerca').prop('value'));
	  paqueteDeDatosRegi.append('namedepamerca', $('#namedepamerca').prop('value'));
	  paqueteDeDatosRegi.append('unavaria', $('#unavaria').prop('value'));
      var destino = "partidasql/partidamercado.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnslmerca').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//departamentos
	$('#btncnsldepa').on('click', function (M){
	$('.bs-exampldepa-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('html, body').animate({
           'scrollTop':   $('#alertmuestra').offset().top
         }, 1000); //ancla hacia el DIV
		
		var dato1 = $("#unavariadepa")[0].value.length;
      if(dato1 === 0){
        $("select#unavariadepa").focus();
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
      paqueteDeDatosRegi.append('partidadepa', $('#partidadepa').prop('value'));
      paqueteDeDatosRegi.append('codubidepa', $('#codubidepa').prop('value'));
	  paqueteDeDatosRegi.append('namedepadepa', $('#namedepadepa').prop('value'));
	  paqueteDeDatosRegi.append('unavariadepa', $('#unavariadepa').prop('value'));
      var destino = "partidasql/partidadepar.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnsldepa').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//empresa
	$('#btncnslemp').on('click', function (M){
	$('.bs-examplemp-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('html, body').animate({
           'scrollTop':   $('#alertmuestra').offset().top
         }, 1000); //ancla hacia el DIV
		
		var dato1 = $("#unavariaemp")[0].value.length;
      if(dato1 === 0){
        $("select#unavariaemp").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione un Indicador",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
      //$('#btncnslemp').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btncnslemp').val("Procesando envio espere...");//cambia texto de boton
      M.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
      paqueteDeDatosRegi.append('partidaemp', $('#partidaemp').prop('value'));
      paqueteDeDatosRegi.append('codubiemp', $('#codubiemp').prop('value'));
	  paqueteDeDatosRegi.append('namedepaemp', $('#namedepaemp').prop('value'));
	  paqueteDeDatosRegi.append('unavariaemp', $('#unavariaemp').prop('value'));
      var destino = "partidasql/partidaempresa.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnslemp').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//agente aduanas
	$('#btncnslageadu').on('click', function (M){
	$('.bs-examplageadu-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('html, body').animate({
           'scrollTop':   $('#alertmuestra').offset().top
         }, 1000); //ancla hacia el DIV
		
		var dato1 = $("#unavariaage")[0].value.length;
      if(dato1 === 0){
        $("select#unavariaage").focus();
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
      paqueteDeDatosRegi.append('partidaage', $('#partidaage').prop('value'));
      paqueteDeDatosRegi.append('codubiage', $('#codubiage').prop('value'));
	  paqueteDeDatosRegi.append('namedepage', $('#namedepage').prop('value'));
	  paqueteDeDatosRegi.append('unavariaage', $('#unavariaage').prop('value'));
      var destino = "partidasql/partidagenteaduanas.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnslageadu').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//aduanas
	$('#btncnsladua').on('click', function (M){
	$('.bs-exampladua-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('html, body').animate({
           'scrollTop':   $('#alertmuestra').offset().top
         }, 1000); //ancla hacia el DIV
		
		var dato1 = $("#unavariaadua")[0].value.length;
      if(dato1 === 0){
        $("select#unavariaadua").focus();
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
      paqueteDeDatosRegi.append('partidaadua', $('#partidaadua').prop('value'));
      paqueteDeDatosRegi.append('codubiadua', $('#codubiadua').prop('value'));
	  paqueteDeDatosRegi.append('namedepadua', $('#namedepadua').prop('value'));
	  paqueteDeDatosRegi.append('unavariaadua', $('#unavariaadua').prop('value'));
      var destino = "partidasql/partidaduanas.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnsladua').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//evaluacion de mercados
	$('#btncnslevamer').on('click', function (M){
	$('.bs-examplevamer-modal-sm').modal('hide')//cerramos modal
		$('#gria').show();// muestro DIV
		$('html, body').animate({
           'scrollTop':   $('#alertmuestra').offset().top
         }, 1000); //ancla hacia el DIV
		
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
      paqueteDeDatosRegi.append('partidaevmer', $('#partidaevmer').prop('value'));
      paqueteDeDatosRegi.append('codubievmer', $('#codubievmer').prop('value'));
	  paqueteDeDatosRegi.append('namedepaevmer', $('#namedepaevmer').prop('value'));
	  paqueteDeDatosRegi.append('unavariaevamer', $('#unavariaevamer').prop('value'));
      var destino = "productosql/productoevaluamercado.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnslevamer').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	

  });
  function Limpiar(){
   /* $("#depavalue").val("");*/ $("#datopartida").val(""); $('#busca').prop('disabled', false); $('#gria').hide();
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