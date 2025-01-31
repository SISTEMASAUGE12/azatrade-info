$(function(){
    $('#busca').on('click', function (T){ 
		var dato2 = $("#mercado")[0].value.length;
      if(dato2 === 0){
        //$("input#datopartida").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Seleccione Mercado",
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
      paqueteDeDatosRegi.append('mercado', $('#mercado').prop('value'));
      var destino = "mercadobusca-btn.php"; 
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
      paqueteDeDatosRegi.append('namepaisA', $('#namepaisA').prop('value'));
      paqueteDeDatosRegi.append('codepaisA', $('#codepaisA').prop('value'));
	  paqueteDeDatosRegi.append('codubi', $('#codubi').prop('value'));
	  paqueteDeDatosRegi.append('namedepa', $('#namedepa').prop('value'));
      var destino = "mercadosql/indicaanual.php";
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
      paqueteDeDatosRegi.append('namepaisB', $('#namepaisB').prop('value'));
      paqueteDeDatosRegi.append('codepaisB', $('#codepaisB').prop('value'));
	  paqueteDeDatosRegi.append('codubiB', $('#codubiB').prop('value'));
	  paqueteDeDatosRegi.append('namedepaB', $('#namedepaB').prop('value'));
	  paqueteDeDatosRegi.append('year', $('#year').prop('value'));
      var destino = "mercadosql/indicadormensual.php";
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
      paqueteDeDatosRegi.append('namepaisC', $('#namepaisC').prop('value'));
      paqueteDeDatosRegi.append('codepaisC', $('#codepaisC').prop('value'));
	  paqueteDeDatosRegi.append('codubiC', $('#codubiC').prop('value'));
	  paqueteDeDatosRegi.append('namedepaC', $('#namedepaC').prop('value'));
	  paqueteDeDatosRegi.append('unavariaestaci', $('#unavariaestaci').prop('value'));
      var destino = "mercadosql/estacionalidad.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnslesta').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//partida
	$('#btncnslmerca').on('click', function (M){
	$('.bs-examplparti-modal-sm').modal('hide')//cerramos modal
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
      paqueteDeDatosRegi.append('namepaisD', $('#namepaisD').prop('value'));
      paqueteDeDatosRegi.append('codepaisD', $('#codepaisD').prop('value'));
	  paqueteDeDatosRegi.append('codubiD', $('#codubiD').prop('value'));
	  paqueteDeDatosRegi.append('namedepaD', $('#namedepaD').prop('value'));
	  paqueteDeDatosRegi.append('dosvaria', $('#dosvaria').prop('value'));
	  paqueteDeDatosRegi.append('unavaria', $('#unavaria').prop('value'));
      var destino = "mercadosql/partidas.php";
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
		
		var dato1 = $("#unavariaG")[0].value.length;
      if(dato1 === 0){
        $("select#unavariaG").focus();
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
      paqueteDeDatosRegi.append('namepaisG', $('#namepaisG').prop('value'));
      paqueteDeDatosRegi.append('codepaisG', $('#codepaisG').prop('value'));
	  paqueteDeDatosRegi.append('codubiG', $('#codubiG').prop('value'));
	  paqueteDeDatosRegi.append('namedepaG', $('#namedepaG').prop('value'));
	  paqueteDeDatosRegi.append('dosvariaG', $('#dosvariaG').prop('value'));
	  paqueteDeDatosRegi.append('unavariaG', $('#unavariaG').prop('value'));
      var destino = "mercadosql/partidas.php";
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
		
		var dato1 = $("#unavariaF")[0].value.length;
      if(dato1 === 0){
        $("select#unavariaF").focus();
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
      paqueteDeDatosRegi.append('namepaisF', $('#namepaisF').prop('value'));
      paqueteDeDatosRegi.append('codepaisF', $('#codepaisF').prop('value'));
	  paqueteDeDatosRegi.append('codubiF', $('#codubiF').prop('value'));
	  paqueteDeDatosRegi.append('namedepaF', $('#namedepaF').prop('value'));
	  paqueteDeDatosRegi.append('dosvariaF', $('#dosvariaF').prop('value'));
	  paqueteDeDatosRegi.append('unavariaF', $('#unavariaF').prop('value'));
      var destino = "mercadosql/partidas.php";
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
		
		var dato1 = $("#unavariaH")[0].value.length;
      if(dato1 === 0){
        $("select#unavariaH").focus();
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
      paqueteDeDatosRegi.append('namepaisH', $('#namepaisH').prop('value'));
      paqueteDeDatosRegi.append('codepaisH', $('#codepaisH').prop('value'));
	  paqueteDeDatosRegi.append('codubiH', $('#codubiH').prop('value'));
	  paqueteDeDatosRegi.append('namedepaH', $('#namedepaH').prop('value'));
	  paqueteDeDatosRegi.append('dosvariaH', $('#dosvariaH').prop('value'));
	  paqueteDeDatosRegi.append('unavariaH', $('#unavariaH').prop('value'));
      var destino = "mercadosql/partidas.php";
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
		
		var dato1 = $("#unavariaI")[0].value.length;
      if(dato1 === 0){
        $("select#unavariaI").focus();
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
      paqueteDeDatosRegi.append('namepaisI', $('#namepaisI').prop('value'));
      paqueteDeDatosRegi.append('codepaisI', $('#codepaisI').prop('value'));
	  paqueteDeDatosRegi.append('codubiI', $('#codubiI').prop('value'));
	  paqueteDeDatosRegi.append('namedepaI', $('#namedepaI').prop('value'));
	  paqueteDeDatosRegi.append('dosvariaI', $('#dosvariaI').prop('value'));
	  paqueteDeDatosRegi.append('unavariaI', $('#unavariaI').prop('value'));
      var destino = "mercadosql/partidas.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnsladua').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	
	//puertos de ingreso
	$('#btncnslevamer').on('click', function (M){
	$('.bs-examplepueing-modal-sm').modal('hide')//cerramos modal
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
      paqueteDeDatosRegi.append('namepaisE', $('#namepaisE').prop('value'));
      paqueteDeDatosRegi.append('codepaisE', $('#codepaisE').prop('value'));
	  paqueteDeDatosRegi.append('codubiE', $('#codubiE').prop('value'));
	  paqueteDeDatosRegi.append('namedepaE', $('#namedepaE').prop('value'));
	  paqueteDeDatosRegi.append('dosvariaE', $('#dosvariaE').prop('value'));
	  paqueteDeDatosRegi.append('unavariaevamer', $('#unavariaevamer').prop('value'));
      var destino = "mercadosql/partidas.php";
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alertmuestra").html("<center><img src='../images/loading.gif' width='32px' ><br> <b>Procesando Consulta, esto puede tardar unos minutos, espere por favor...</b></center>"); },
        success:function(data){ $('#alertmuestra').html(data); $('#btncnslevamer').val("Consultar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });
	

  });
  function Limpiar(){
   /* $("#depavalue").val(""); $("#mercado").val("");*/ $('#busca').prop('disabled', false); $('#gria').hide();
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